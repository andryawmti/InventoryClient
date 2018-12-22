<script>
    new Vue({
        el: "#buying-wrapper",
        data() {
            return {
                sub_total: 0,
                delivery_cost: 0,
                grand_total: 0,
                transaction_items:[],
                item: {
                    product_id:'',
                    product_name: 'Choose Product',
                    quantity: 0,
                    price: 0,
                },
                distributor: {
                    id: "",
                    name: "Choose Distributor"
                },
                show_distributor_popup: false,
                show_product_popup: false
            }
        },
        methods: {
            showHidePickDistributor() {
                this.show_distributor_popup = !this.show_distributor_popup;
            },
            pickDistributor(distributor_id, distributor_name) {
                this.distributor.id = distributor_id;
                this.distributor.name = distributor_name;
                this.showHidePickDistributor();
            },
            showHidePickProduct() {
                this.show_product_popup = !this.show_product_popup;
            },
            pickProduct(product) {
                product = JSON.parse(product);
                this.item.product_id = product.id;
                this.item.product_name = product.name;
                this.item.price = product.sell_price;
                this.showHidePickProduct();
            },
            addItem() {
                this.transaction_items.push(_.cloneDeep(this.item));
                this.calculateSubTotal();
                this.calculateGrandTotal();
                this.resetItem();
            },
            calculateSubTotal() {
                this.sub_total = 0;
                this.transaction_items.forEach((ti) => {
                    this.sub_total += parseInt(ti.price) * parseInt(ti.quantity);
                })
            },
            calculateGrandTotal() {
                this.grand_total = parseInt(this.sub_total) + parseInt(this.delivery_cost);
            },
            resetItem() {
                this.item.product_id = '';
                this.item.product_name = 'Choose Product';
                this.item.price = 0;
                this.item.quantity = 0;
            },
            saveTransaction() {
                let transaction = {
                    transaction_category_id: 2,
                    customer_id: null,
                    distributor_id: this.distributor.id,
                    delivery_cost: this.delivery_cost,
                    sub_total: this.sub_total,
                    total: this.grand_total,
                    status: 'checked',
                    transaction_items:this.transaction_items
                };
                axios.post('{{ route('transaction.store') }}', transaction)
                    .then((result) => {
                        this.resetTransactionParams();
                        if (result.data.success) {
                            alert(result.data.message + ', transaction_id = ' + result.data.transaction_id);
                        } else {
                            alert(result.data.message);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            },
            resetTransactionParams() {
                this.distributor.id = '';
                this.distributor.name = 'Choose Distributor';
                this.transaction_items = [];
                this.sub_total = 0;
                this.grand_total = 0;
                this.delivery_cost = 0;
            }
        },
        created(){

        }
    });
</script>
<style>
    .my-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #ffffff;
        padding: 10px;
        box-shadow: 0px 0px 4px 2px #6c757d;
    }

    .my-popup-show {
        display: block;
    }

    .my-popup-hide {
        display: none;
    }
</style>