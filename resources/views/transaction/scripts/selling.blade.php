<script>
    new Vue({
        el: "#selling-wrapper",
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
               customer: {
                   id: "",
                   name: "Choose Customer"
               },
               show_customer_popup: false,
               show_product_popup: false
           }
        },
        methods: {
            showHidePickCustomer() {
                this.show_customer_popup = !this.show_customer_popup;
            },
            pickCustomer(customer_id, customer_name) {
                this.customer.id = customer_id;
                this.customer.name = customer_name;
                this.showHidePickCustomer();
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
                    transaction_category_id: 1,
                    customer_id: this.customer.id,
                    distributor_id: null,
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
                this.customer.id = '';
                this.customer.name = 'Choose Customer';
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