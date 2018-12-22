!function(t){t.color={},t.color.make=function(i,e,o,n){var a={};return a.r=i||0,a.g=e||0,a.b=o||0,a.a=null!=n?n:1,a.add=function(t,i){for(var e=0;e<t.length;++e)a[t.charAt(e)]+=i;return a.normalize()},a.scale=function(t,i){for(var e=0;e<t.length;++e)a[t.charAt(e)]*=i;return a.normalize()},a.toString=function(){return a.a>=1?"rgb("+[a.r,a.g,a.b].join(",")+")":"rgba("+[a.r,a.g,a.b,a.a].join(",")+")"},a.normalize=function(){function t(t,i,e){return i<t?t:i>e?e:i}return a.r=t(0,parseInt(a.r),255),a.g=t(0,parseInt(a.g),255),a.b=t(0,parseInt(a.b),255),a.a=t(0,a.a,1),a},a.clone=function(){return t.color.make(a.r,a.b,a.g,a.a)},a.normalize()},t.color.extract=function(i,e){var o;do{if(""!=(o=i.css(e).toLowerCase())&&"transparent"!=o)break;i=i.parent()}while(i.length&&!t.nodeName(i.get(0),"body"));return"rgba(0, 0, 0, 0)"==o&&(o="transparent"),t.color.parse(o)},t.color.parse=function(e){var o,n=t.color.make;if(o=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(e))return n(parseInt(o[1],10),parseInt(o[2],10),parseInt(o[3],10));if(o=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(e))return n(parseInt(o[1],10),parseInt(o[2],10),parseInt(o[3],10),parseFloat(o[4]));if(o=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(e))return n(2.55*parseFloat(o[1]),2.55*parseFloat(o[2]),2.55*parseFloat(o[3]));if(o=/rgba\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(e))return n(2.55*parseFloat(o[1]),2.55*parseFloat(o[2]),2.55*parseFloat(o[3]),parseFloat(o[4]));if(o=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(e))return n(parseInt(o[1],16),parseInt(o[2],16),parseInt(o[3],16));if(o=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(e))return n(parseInt(o[1]+o[1],16),parseInt(o[2]+o[2],16),parseInt(o[3]+o[3],16));var a=t.trim(e).toLowerCase();return"transparent"==a?n(255,255,255,0):n((o=i[a]||[0,0,0])[0],o[1],o[2])};var i={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0]}}(jQuery),function(t){var i=Object.prototype.hasOwnProperty;function e(i,e){var o=e.children("."+i)[0];if(null==o&&((o=document.createElement("canvas")).className=i,t(o).css({direction:"ltr",position:"absolute",left:0,top:0}).appendTo(e),!o.getContext)){if(!window.G_vmlCanvasManager)throw new Error("Canvas is not available. If you're using IE with a fall-back such as Excanvas, then there's either a mistake in your conditional include, or the page has no DOCTYPE and is rendering in Quirks Mode.");o=window.G_vmlCanvasManager.initElement(o)}this.element=o;var n=this.context=o.getContext("2d"),a=window.devicePixelRatio||1,r=n.webkitBackingStorePixelRatio||n.mozBackingStorePixelRatio||n.msBackingStorePixelRatio||n.oBackingStorePixelRatio||n.backingStorePixelRatio||1;this.pixelRatio=a/r,this.resize(e.width(),e.height()),this.textContainer=null,this.text={},this._textCache={}}function o(i,o,n,a){var r=[],l={colors:["#edc240","#afd8f8","#cb4b4b","#4da74d","#9440ed"],legend:{show:!0,noColumns:1,labelFormatter:null,labelBoxBorderColor:"#ccc",container:null,position:"ne",margin:5,backgroundColor:null,backgroundOpacity:.85,sorted:null},xaxis:{show:null,position:"bottom",mode:null,font:null,color:null,tickColor:null,transform:null,inverseTransform:null,min:null,max:null,autoscaleMargin:null,ticks:null,tickFormatter:null,labelWidth:null,labelHeight:null,reserveSpace:null,tickLength:null,alignTicksWithAxis:null,tickDecimals:null,tickSize:null,minTickSize:null},yaxis:{autoscaleMargin:.02,position:"left"},xaxes:[],yaxes:[],series:{points:{show:!1,radius:3,lineWidth:2,fill:!0,fillColor:"#ffffff",symbol:"circle"},lines:{lineWidth:2,fill:!1,fillColor:null,steps:!1},bars:{show:!1,lineWidth:2,barWidth:1,fill:!0,fillColor:null,align:"left",horizontal:!1,zero:!0},shadowSize:3,highlightColor:null},grid:{show:!0,aboveData:!1,color:"#545454",backgroundColor:null,borderColor:null,tickColor:null,margin:0,labelMargin:5,axisMargin:8,borderWidth:2,minBorderMargin:null,markings:null,markingsColor:"#f4f4f4",markingsLineWidth:2,clickable:!1,hoverable:!1,autoHighlight:!0,mouseActiveRadius:10},interaction:{redrawOverlayInterval:1e3/60},hooks:{}},s=null,c=null,h=null,f=null,u=null,d=[],p=[],m={left:0,right:0,top:0,bottom:0},x=0,g=0,b={processOptions:[],processRawData:[],processDatapoints:[],processOffset:[],drawBackground:[],drawSeries:[],draw:[],bindEvents:[],drawOverlay:[],shutdown:[]},v=this;function k(t,i){i=[v].concat(i);for(var e=0;e<t.length;++e)t[e].apply(this,i)}function y(i){r=function(i){for(var e=[],o=0;o<i.length;++o){var n=t.extend(!0,{},l.series);null!=i[o].data?(n.data=i[o].data,delete i[o].data,t.extend(!0,n,i[o]),i[o].data=n.data):n.data=i[o],e.push(n)}return e}(i),function(){var i,e=r.length,o=-1;for(i=0;i<r.length;++i){var n=r[i].color;null!=n&&(e--,"number"==typeof n&&n>o&&(o=n))}e<=o&&(e=o+1);var a,s=[],c=l.colors,h=c.length,f=0;for(i=0;i<e;i++)a=t.color.parse(c[i%h]||"#666"),i%h==0&&i&&(f=f>=0?f<.5?-f-.2:0:-f),s[i]=a.scale("rgb",1+f);var u,m=0;for(i=0;i<r.length;++i){if(null==(u=r[i]).color?(u.color=s[m].toString(),++m):"number"==typeof u.color&&(u.color=s[u.color].toString()),null==u.lines.show){var x,g=!0;for(x in u)if(u[x]&&u[x].show){g=!1;break}g&&(u.lines.show=!0)}null==u.lines.zero&&(u.lines.zero=!!u.lines.fill),u.xaxis=C(d,w(u,"x")),u.yaxis=C(p,w(u,"y"))}}(),function(){var i,e,o,n,a,l,s,c,h,f,u,d,p=Number.POSITIVE_INFINITY,m=Number.NEGATIVE_INFINITY,x=Number.MAX_VALUE;function g(t,i,e){i<t.datamin&&i!=-x&&(t.datamin=i),e>t.datamax&&e!=x&&(t.datamax=e)}for(t.each(M(),function(t,i){i.datamin=p,i.datamax=m,i.used=!1}),i=0;i<r.length;++i)(a=r[i]).datapoints={points:[]},k(b.processRawData,[a,a.data,a.datapoints]);for(i=0;i<r.length;++i){if(a=r[i],u=a.data,!(d=a.datapoints.format)){if((d=[]).push({x:!0,number:!0,required:!0}),d.push({y:!0,number:!0,required:!0}),a.bars.show||a.lines.show&&a.lines.fill){var v=!!(a.bars.show&&a.bars.zero||a.lines.show&&a.lines.zero);d.push({y:!0,number:!0,required:!1,defaultValue:0,autoscale:v}),a.bars.horizontal&&(delete d[d.length-1].y,d[d.length-1].x=!0)}a.datapoints.format=d}if(null==a.datapoints.pointsize){a.datapoints.pointsize=d.length,s=a.datapoints.pointsize,l=a.datapoints.points;var y=a.lines.show&&a.lines.steps;for(a.xaxis.used=a.yaxis.used=!0,e=o=0;e<u.length;++e,o+=s){var w=null==(f=u[e]);if(!w)for(n=0;n<s;++n)c=f[n],(h=d[n])&&(h.number&&null!=c&&(c=+c,isNaN(c)?c=null:c==1/0?c=x:c==-1/0&&(c=-x)),null==c&&(h.required&&(w=!0),null!=h.defaultValue&&(c=h.defaultValue))),l[o+n]=c;if(w)for(n=0;n<s;++n)null!=(c=l[o+n])&&!1!==(h=d[n]).autoscale&&(h.x&&g(a.xaxis,c,c),h.y&&g(a.yaxis,c,c)),l[o+n]=null;else if(y&&o>0&&null!=l[o-s]&&l[o-s]!=l[o]&&l[o-s+1]!=l[o+1]){for(n=0;n<s;++n)l[o+s+n]=l[o+n];l[o+1]=l[o-s+1],o+=s}}}}for(i=0;i<r.length;++i)a=r[i],k(b.processDatapoints,[a,a.datapoints]);for(i=0;i<r.length;++i){a=r[i],l=a.datapoints.points,s=a.datapoints.pointsize,d=a.datapoints.format;var T=p,C=p,S=m,W=m;for(e=0;e<l.length;e+=s)if(null!=l[e])for(n=0;n<s;++n)c=l[e+n],(h=d[n])&&!1!==h.autoscale&&c!=x&&c!=-x&&(h.x&&(c<T&&(T=c),c>S&&(S=c)),h.y&&(c<C&&(C=c),c>W&&(W=c)));if(a.bars.show){var z;switch(a.bars.align){case"left":z=0;break;case"right":z=-a.bars.barWidth;break;default:z=-a.bars.barWidth/2}a.bars.horizontal?(C+=z,W+=z+a.bars.barWidth):(T+=z,S+=z+a.bars.barWidth)}g(a.xaxis,T,S),g(a.yaxis,C,W)}t.each(M(),function(t,i){i.datamin==p&&(i.datamin=null),i.datamax==m&&(i.datamax=null)})}()}function w(t,i){var e=t[i+"axis"];return"object"==typeof e&&(e=e.n),"number"!=typeof e&&(e=1),e}function M(){return t.grep(d.concat(p),function(t){return t})}function T(t){var i,e,o={};for(i=0;i<d.length;++i)(e=d[i])&&e.used&&(o["x"+e.n]=e.c2p(t.left));for(i=0;i<p.length;++i)(e=p[i])&&e.used&&(o["y"+e.n]=e.c2p(t.top));return void 0!==o.x1&&(o.x=o.x1),void 0!==o.y1&&(o.y=o.y1),o}function C(i,e){return i[e-1]||(i[e-1]={n:e,direction:i==d?"x":"y",options:t.extend(!0,{},i==d?l.xaxis:l.yaxis)}),i[e-1]}function S(){O&&clearTimeout(O),h.unbind("mousemove",R),h.unbind("mouseleave",H),h.unbind("click",j),k(b.shutdown,[h])}function W(i){var e=i.labelWidth,o=i.labelHeight,n=i.options.position,a="x"===i.direction,r=i.options.tickLength,c=l.grid.axisMargin,h=l.grid.labelMargin,f=!0,u=!0,x=!0,g=!1;t.each(a?d:p,function(t,e){e&&(e.show||e.reserveSpace)&&(e===i?g=!0:e.options.position===n&&(g?u=!1:f=!1),g||(x=!1))}),u&&(c=0),null==r&&(r=x?"full":5),isNaN(+r)||(h+=+r),a?(o+=h,"bottom"==n?(m.bottom+=o+c,i.box={top:s.height-m.bottom,height:o}):(i.box={top:m.top+c,height:o},m.top+=o+c)):(e+=h,"left"==n?(i.box={left:m.left+c,width:e},m.left+=e+c):(m.right+=e+c,i.box={left:s.width-m.right,width:e})),i.position=n,i.tickLength=r,i.box.padding=h,i.innermost=f}function z(){var e,o=M(),n=l.grid.show;for(var a in m){var c=l.grid.margin||0;m[a]="number"==typeof c?c:c[a]||0}for(var a in k(b.processOffset,[m]),m)"object"==typeof l.grid.borderWidth?m[a]+=n?l.grid.borderWidth[a]:0:m[a]+=n?l.grid.borderWidth:0;if(t.each(o,function(t,i){var e=i.options;i.show=null==e.show?i.used:e.show,i.reserveSpace=null==e.reserveSpace?i.show:e.reserveSpace,function(t){var i=t.options,e=+(null!=i.min?i.min:t.datamin),o=+(null!=i.max?i.max:t.datamax),n=o-e;if(0==n){var a=0==o?1:.01;null==i.min&&(e-=a),null!=i.max&&null==i.min||(o+=a)}else{var r=i.autoscaleMargin;null!=r&&(null==i.min&&(e-=n*r)<0&&null!=t.datamin&&t.datamin>=0&&(e=0),null==i.max&&(o+=n*r)>0&&null!=t.datamax&&t.datamax<=0&&(o=0))}t.min=e,t.max=o}(i)}),n){var h=t.grep(o,function(t){return t.show||t.reserveSpace});for(t.each(h,function(i,e){var o,n;!function(i){var e,o=i.options;e="number"==typeof o.ticks&&o.ticks>0?o.ticks:.3*Math.sqrt("x"==i.direction?s.width:s.height);var n=(i.max-i.min)/e,a=-Math.floor(Math.log(n)/Math.LN10),r=o.tickDecimals;null!=r&&a>r&&(a=r);var l,c=Math.pow(10,-a),h=n/c;h<1.5?l=1:h<3?(l=2,h>2.25&&(null==r||a+1<=r)&&(l=2.5,++a)):l=h<7.5?5:10;l*=c,null!=o.minTickSize&&l<o.minTickSize&&(l=o.minTickSize);if(i.delta=n,i.tickDecimals=Math.max(0,null!=r?r:a),i.tickSize=o.tickSize||l,"time"==o.mode&&!i.tickGenerator)throw new Error("Time mode requires the flot.time plugin.");i.tickGenerator||(i.tickGenerator=function(t){for(var i,e,o,n=[],a=(e=t.min,(o=t.tickSize)*Math.floor(e/o)),r=0,l=Number.NaN;i=l,l=a+r*t.tickSize,n.push(l),++r,l<t.max&&l!=i;);return n},i.tickFormatter=function(t,i){var e=i.tickDecimals?Math.pow(10,i.tickDecimals):1,o=""+Math.round(t*e)/e;if(null!=i.tickDecimals){var n=o.indexOf("."),a=-1==n?0:o.length-n-1;if(a<i.tickDecimals)return(a?o:o+".")+(""+e).substr(1,i.tickDecimals-a)}return o});t.isFunction(o.tickFormatter)&&(i.tickFormatter=function(t,i){return""+o.tickFormatter(t,i)});if(null!=o.alignTicksWithAxis){var f=("x"==i.direction?d:p)[o.alignTicksWithAxis-1];if(f&&f.used&&f!=i){var u=i.tickGenerator(i);if(u.length>0&&(null==o.min&&(i.min=Math.min(i.min,u[0])),null==o.max&&u.length>1&&(i.max=Math.max(i.max,u[u.length-1]))),i.tickGenerator=function(t){var i,e,o=[];for(e=0;e<f.ticks.length;++e)i=(f.ticks[e].v-f.min)/(f.max-f.min),i=t.min+i*(t.max-t.min),o.push(i);return o},!i.mode&&null==o.tickDecimals){var m=Math.max(0,1-Math.floor(Math.log(i.delta)/Math.LN10)),x=i.tickGenerator(i);x.length>1&&/\..*0$/.test((x[1]-x[0]).toFixed(m))||(i.tickDecimals=m)}}}}(e),function(i){var e,o,n=i.options.ticks,a=[];null==n||"number"==typeof n&&n>0?a=i.tickGenerator(i):n&&(a=t.isFunction(n)?n(i):n);for(i.ticks=[],e=0;e<a.length;++e){var r=null,l=a[e];"object"==typeof l?(o=+l[0],l.length>1&&(r=l[1])):o=+l,null==r&&(r=i.tickFormatter(o,i)),isNaN(o)||i.ticks.push({v:o,label:r})}}(e),o=e,n=e.ticks,o.options.autoscaleMargin&&n.length>0&&(null==o.options.min&&(o.min=Math.min(o.min,n[0].v)),null==o.options.max&&n.length>1&&(o.max=Math.max(o.max,n[n.length-1].v))),function(t){for(var i=t.options,e=t.ticks||[],o=i.labelWidth||0,n=i.labelHeight||0,a=o||("x"==t.direction?Math.floor(s.width/(e.length||1)):null),r=t.direction+"Axis "+t.direction+t.n+"Axis",l="flot-"+t.direction+"-axis flot-"+t.direction+t.n+"-axis "+r,c=i.font||"flot-tick-label tickLabel",h=0;h<e.length;++h){var f=e[h];if(f.label){var u=s.getTextInfo(l,f.label,c,null,a);o=Math.max(o,u.width),n=Math.max(n,u.height)}}t.labelWidth=i.labelWidth||o,t.labelHeight=i.labelHeight||n}(e)}),e=h.length-1;e>=0;--e)W(h[e]);!function(){var i,e=l.grid.minBorderMargin;if(null==e)for(e=0,i=0;i<r.length;++i)e=Math.max(e,2*(r[i].points.radius+r[i].points.lineWidth/2));var o={left:e,right:e,top:e,bottom:e};t.each(M(),function(t,i){i.reserveSpace&&i.ticks&&i.ticks.length&&("x"===i.direction?(o.left=Math.max(o.left,i.labelWidth/2),o.right=Math.max(o.right,i.labelWidth/2)):(o.bottom=Math.max(o.bottom,i.labelHeight/2),o.top=Math.max(o.top,i.labelHeight/2)))}),m.left=Math.ceil(Math.max(o.left,m.left)),m.right=Math.ceil(Math.max(o.right,m.right)),m.top=Math.ceil(Math.max(o.top,m.top)),m.bottom=Math.ceil(Math.max(o.bottom,m.bottom))}(),t.each(h,function(t,i){var e;"x"==(e=i).direction?(e.box.left=m.left-e.labelWidth/2,e.box.width=s.width-m.left-m.right+e.labelWidth):(e.box.top=m.top-e.labelHeight/2,e.box.height=s.height-m.bottom-m.top+e.labelHeight)})}x=s.width-m.left-m.right,g=s.height-m.bottom-m.top,t.each(o,function(t,i){!function(t){function i(t){return t}var e,o,n=t.options.transform||i,a=t.options.inverseTransform;"x"==t.direction?(e=t.scale=x/Math.abs(n(t.max)-n(t.min)),o=Math.min(n(t.max),n(t.min))):(e=-(e=t.scale=g/Math.abs(n(t.max)-n(t.min))),o=Math.max(n(t.max),n(t.min))),t.p2c=n==i?function(t){return(t-o)*e}:function(t){return(n(t)-o)*e},t.c2p=a?function(t){return a(o+t/e)}:function(t){return o+t/e}}(i)}),n&&t.each(M(),function(t,i){var e,o,n,a,r,l=i.box,c=i.direction+"Axis "+i.direction+i.n+"Axis",h="flot-"+i.direction+"-axis flot-"+i.direction+i.n+"-axis "+c,f=i.options.font||"flot-tick-label tickLabel";if(s.removeText(h),i.show&&0!=i.ticks.length)for(var u=0;u<i.ticks.length;++u)!(e=i.ticks[u]).label||e.v<i.min||e.v>i.max||("x"==i.direction?(a="center",o=m.left+i.p2c(e.v),"bottom"==i.position?n=l.top+l.padding:(n=l.top+l.height-l.padding,r="bottom")):(r="middle",n=m.top+i.p2c(e.v),"left"==i.position?(o=l.left+l.width-l.padding,a="right"):o=l.left+l.padding),s.addText(h,o,n,e.label,f,null,null,a,r))}),function(){null!=l.legend.container?t(l.legend.container).html(""):i.find(".legend").remove();if(!l.legend.show)return;for(var e,o,n=[],a=[],s=!1,c=l.legend.labelFormatter,h=0;h<r.length;++h)(e=r[h]).label&&(o=c?c(e.label,e):e.label)&&a.push({label:o,color:e.color});if(l.legend.sorted)if(t.isFunction(l.legend.sorted))a.sort(l.legend.sorted);else if("reverse"==l.legend.sorted)a.reverse();else{var f="descending"!=l.legend.sorted;a.sort(function(t,i){return t.label==i.label?0:t.label<i.label!=f?1:-1})}for(var h=0;h<a.length;++h){var u=a[h];h%l.legend.noColumns==0&&(s&&n.push("</tr>"),n.push("<tr>"),s=!0),n.push('<td class="legendColorBox"><div style="border:1px solid '+l.legend.labelBoxBorderColor+';padding:1px"><div style="width:4px;height:0;border:5px solid '+u.color+';overflow:hidden"></div></div></td><td class="legendLabel">'+u.label+"</td>")}s&&n.push("</tr>");if(0==n.length)return;var d='<table style="font-size:smaller;color:'+l.grid.color+'">'+n.join("")+"</table>";if(null!=l.legend.container)t(l.legend.container).html(d);else{var p="",x=l.legend.position,g=l.legend.margin;null==g[0]&&(g=[g,g]),"n"==x.charAt(0)?p+="top:"+(g[1]+m.top)+"px;":"s"==x.charAt(0)&&(p+="bottom:"+(g[1]+m.bottom)+"px;"),"e"==x.charAt(1)?p+="right:"+(g[0]+m.right)+"px;":"w"==x.charAt(1)&&(p+="left:"+(g[0]+m.left)+"px;");var b=t('<div class="legend">'+d.replace('style="','style="position:absolute;'+p+";")+"</div>").appendTo(i);if(0!=l.legend.backgroundOpacity){var v=l.legend.backgroundColor;null==v&&((v=(v=l.grid.backgroundColor)&&"string"==typeof v?t.color.parse(v):t.color.extract(b,"background-color")).a=1,v=v.toString());var k=b.children();t('<div style="position:absolute;width:'+k.width()+"px;height:"+k.height()+"px;"+p+"background-color:"+v+';"> </div>').prependTo(b).css("opacity",l.legend.backgroundOpacity)}}}()}function I(){s.clear(),k(b.drawBackground,[f]);var t=l.grid;t.show&&t.backgroundColor&&(f.save(),f.translate(m.left,m.top),f.fillStyle=Q(l.grid.backgroundColor,g,0,"rgba(255, 255, 255, 0)"),f.fillRect(0,0,x,g),f.restore()),t.show&&!t.aboveData&&F();for(var i=0;i<r.length;++i)k(b.drawSeries,[f,r[i]]),P(r[i]);k(b.draw,[f]),t.show&&t.aboveData&&F(),s.render(),B()}function A(t,i){for(var e,o,n,a,r=M(),l=0;l<r.length;++l)if((e=r[l]).direction==i&&(t[a=i+e.n+"axis"]||1!=e.n||(a=i+"axis"),t[a])){o=t[a].from,n=t[a].to;break}if(t[a]||(e="x"==i?d[0]:p[0],o=t[i+"1"],n=t[i+"2"]),null!=o&&null!=n&&o>n){var s=o;o=n,n=s}return{from:o,to:n,axis:e}}function F(){var i,e,o,n;f.save(),f.translate(m.left,m.top);var a=l.grid.markings;if(a)for(t.isFunction(a)&&((e=v.getAxes()).xmin=e.xaxis.min,e.xmax=e.xaxis.max,e.ymin=e.yaxis.min,e.ymax=e.yaxis.max,a=a(e)),i=0;i<a.length;++i){var r=a[i],s=A(r,"x"),c=A(r,"y");if(null==s.from&&(s.from=s.axis.min),null==s.to&&(s.to=s.axis.max),null==c.from&&(c.from=c.axis.min),null==c.to&&(c.to=c.axis.max),!(s.to<s.axis.min||s.from>s.axis.max||c.to<c.axis.min||c.from>c.axis.max)){s.from=Math.max(s.from,s.axis.min),s.to=Math.min(s.to,s.axis.max),c.from=Math.max(c.from,c.axis.min),c.to=Math.min(c.to,c.axis.max);var h=s.from===s.to,u=c.from===c.to;if(!h||!u)if(s.from=Math.floor(s.axis.p2c(s.from)),s.to=Math.floor(s.axis.p2c(s.to)),c.from=Math.floor(c.axis.p2c(c.from)),c.to=Math.floor(c.axis.p2c(c.to)),h||u){var d=r.lineWidth||l.grid.markingsLineWidth,p=d%2?.5:0;f.beginPath(),f.strokeStyle=r.color||l.grid.markingsColor,f.lineWidth=d,h?(f.moveTo(s.to+p,c.from),f.lineTo(s.to+p,c.to)):(f.moveTo(s.from,c.to+p),f.lineTo(s.to,c.to+p)),f.stroke()}else f.fillStyle=r.color||l.grid.markingsColor,f.fillRect(s.from,c.to,s.to-s.from,c.from-c.to)}}e=M(),o=l.grid.borderWidth;for(var b=0;b<e.length;++b){var k,y,w,T,C=e[b],S=C.box,W=C.tickLength;if(C.show&&0!=C.ticks.length){for(f.lineWidth=1,"x"==C.direction?(k=0,y="full"==W?"top"==C.position?0:g:S.top-m.top+("top"==C.position?S.height:0)):(y=0,k="full"==W?"left"==C.position?0:x:S.left-m.left+("left"==C.position?S.width:0)),C.innermost||(f.strokeStyle=C.options.color,f.beginPath(),w=T=0,"x"==C.direction?w=x+1:T=g+1,1==f.lineWidth&&("x"==C.direction?y=Math.floor(y)+.5:k=Math.floor(k)+.5),f.moveTo(k,y),f.lineTo(k+w,y+T),f.stroke()),f.strokeStyle=C.options.tickColor,f.beginPath(),i=0;i<C.ticks.length;++i){var z=C.ticks[i].v;w=T=0,isNaN(z)||z<C.min||z>C.max||"full"==W&&("object"==typeof o&&o[C.position]>0||o>0)&&(z==C.min||z==C.max)||("x"==C.direction?(k=C.p2c(z),T="full"==W?-g:W,"top"==C.position&&(T=-T)):(y=C.p2c(z),w="full"==W?-x:W,"left"==C.position&&(w=-w)),1==f.lineWidth&&("x"==C.direction?k=Math.floor(k)+.5:y=Math.floor(y)+.5),f.moveTo(k,y),f.lineTo(k+w,y+T))}f.stroke()}}o&&(n=l.grid.borderColor,"object"==typeof o||"object"==typeof n?("object"!=typeof o&&(o={top:o,right:o,bottom:o,left:o}),"object"!=typeof n&&(n={top:n,right:n,bottom:n,left:n}),o.top>0&&(f.strokeStyle=n.top,f.lineWidth=o.top,f.beginPath(),f.moveTo(0-o.left,0-o.top/2),f.lineTo(x,0-o.top/2),f.stroke()),o.right>0&&(f.strokeStyle=n.right,f.lineWidth=o.right,f.beginPath(),f.moveTo(x+o.right/2,0-o.top),f.lineTo(x+o.right/2,g),f.stroke()),o.bottom>0&&(f.strokeStyle=n.bottom,f.lineWidth=o.bottom,f.beginPath(),f.moveTo(x+o.right,g+o.bottom/2),f.lineTo(0,g+o.bottom/2),f.stroke()),o.left>0&&(f.strokeStyle=n.left,f.lineWidth=o.left,f.beginPath(),f.moveTo(0-o.left/2,g+o.bottom),f.lineTo(0-o.left/2,0),f.stroke())):(f.lineWidth=o,f.strokeStyle=l.grid.borderColor,f.strokeRect(-o/2,-o/2,x+o,g+o))),f.restore()}function P(t){t.lines.show&&function(t){function i(t,i,e,o,n){var a=t.points,r=t.pointsize,l=null,s=null;f.beginPath();for(var c=r;c<a.length;c+=r){var h=a[c-r],u=a[c-r+1],d=a[c],p=a[c+1];if(null!=h&&null!=d){if(u<=p&&u<n.min){if(p<n.min)continue;h=(n.min-u)/(p-u)*(d-h)+h,u=n.min}else if(p<=u&&p<n.min){if(u<n.min)continue;d=(n.min-u)/(p-u)*(d-h)+h,p=n.min}if(u>=p&&u>n.max){if(p>n.max)continue;h=(n.max-u)/(p-u)*(d-h)+h,u=n.max}else if(p>=u&&p>n.max){if(u>n.max)continue;d=(n.max-u)/(p-u)*(d-h)+h,p=n.max}if(h<=d&&h<o.min){if(d<o.min)continue;u=(o.min-h)/(d-h)*(p-u)+u,h=o.min}else if(d<=h&&d<o.min){if(h<o.min)continue;p=(o.min-h)/(d-h)*(p-u)+u,d=o.min}if(h>=d&&h>o.max){if(d>o.max)continue;u=(o.max-h)/(d-h)*(p-u)+u,h=o.max}else if(d>=h&&d>o.max){if(h>o.max)continue;p=(o.max-h)/(d-h)*(p-u)+u,d=o.max}h==l&&u==s||f.moveTo(o.p2c(h)+i,n.p2c(u)+e),l=d,s=p,f.lineTo(o.p2c(d)+i,n.p2c(p)+e)}}f.stroke()}f.save(),f.translate(m.left,m.top),f.lineJoin="round";var e=t.lines.lineWidth,o=t.shadowSize;if(e>0&&o>0){f.lineWidth=o,f.strokeStyle="rgba(0,0,0,0.1)";var n=Math.PI/18;i(t.datapoints,Math.sin(n)*(e/2+o/2),Math.cos(n)*(e/2+o/2),t.xaxis,t.yaxis),f.lineWidth=o/2,i(t.datapoints,Math.sin(n)*(e/2+o/4),Math.cos(n)*(e/2+o/4),t.xaxis,t.yaxis)}f.lineWidth=e,f.strokeStyle=t.color;var a=D(t.lines,t.color,0,g);a&&(f.fillStyle=a,function(t,i,e){var o=t.points,n=t.pointsize,a=Math.min(Math.max(0,e.min),e.max),r=0,l=!1,s=1,c=0,h=0;for(;!(n>0&&r>o.length+n);){var u=o[(r+=n)-n],d=o[r-n+s],p=o[r],m=o[r+s];if(l){if(n>0&&null!=u&&null==p){h=r,n=-n,s=2;continue}if(n<0&&r==c+n){f.fill(),l=!1,s=1,r=c=h+(n=-n);continue}}if(null!=u&&null!=p){if(u<=p&&u<i.min){if(p<i.min)continue;d=(i.min-u)/(p-u)*(m-d)+d,u=i.min}else if(p<=u&&p<i.min){if(u<i.min)continue;m=(i.min-u)/(p-u)*(m-d)+d,p=i.min}if(u>=p&&u>i.max){if(p>i.max)continue;d=(i.max-u)/(p-u)*(m-d)+d,u=i.max}else if(p>=u&&p>i.max){if(u>i.max)continue;m=(i.max-u)/(p-u)*(m-d)+d,p=i.max}if(l||(f.beginPath(),f.moveTo(i.p2c(u),e.p2c(a)),l=!0),d>=e.max&&m>=e.max)f.lineTo(i.p2c(u),e.p2c(e.max)),f.lineTo(i.p2c(p),e.p2c(e.max));else if(d<=e.min&&m<=e.min)f.lineTo(i.p2c(u),e.p2c(e.min)),f.lineTo(i.p2c(p),e.p2c(e.min));else{var x=u,g=p;d<=m&&d<e.min&&m>=e.min?(u=(e.min-d)/(m-d)*(p-u)+u,d=e.min):m<=d&&m<e.min&&d>=e.min&&(p=(e.min-d)/(m-d)*(p-u)+u,m=e.min),d>=m&&d>e.max&&m<=e.max?(u=(e.max-d)/(m-d)*(p-u)+u,d=e.max):m>=d&&m>e.max&&d<=e.max&&(p=(e.max-d)/(m-d)*(p-u)+u,m=e.max),u!=x&&f.lineTo(i.p2c(x),e.p2c(d)),f.lineTo(i.p2c(u),e.p2c(d)),f.lineTo(i.p2c(p),e.p2c(m)),p!=g&&(f.lineTo(i.p2c(p),e.p2c(m)),f.lineTo(i.p2c(g),e.p2c(m)))}}}}(t.datapoints,t.xaxis,t.yaxis));e>0&&i(t.datapoints,0,0,t.xaxis,t.yaxis);f.restore()}(t),t.bars.show&&function(t){var i;switch(f.save(),f.translate(m.left,m.top),f.lineWidth=t.bars.lineWidth,f.strokeStyle=t.color,t.bars.align){case"left":i=0;break;case"right":i=-t.bars.barWidth;break;default:i=-t.bars.barWidth/2}var e=t.bars.fill?function(i,e){return D(t.bars,t.color,i,e)}:null;(function(i,e,o,n,a,r){for(var l=i.points,s=i.pointsize,c=0;c<l.length;c+=s)null!=l[c]&&N(l[c],l[c+1],l[c+2],e,o,n,a,r,f,t.bars.horizontal,t.bars.lineWidth)})(t.datapoints,i,i+t.bars.barWidth,e,t.xaxis,t.yaxis),f.restore()}(t),t.points.show&&function(t){function i(t,i,e,o,n,a,r,l){for(var s=t.points,c=t.pointsize,h=0;h<s.length;h+=c){var u=s[h],d=s[h+1];null==u||u<a.min||u>a.max||d<r.min||d>r.max||(f.beginPath(),u=a.p2c(u),d=r.p2c(d)+o,"circle"==l?f.arc(u,d,i,0,n?Math.PI:2*Math.PI,!1):l(f,u,d,i,n),f.closePath(),e&&(f.fillStyle=e,f.fill()),f.stroke())}}f.save(),f.translate(m.left,m.top);var e=t.points.lineWidth,o=t.shadowSize,n=t.points.radius,a=t.points.symbol;0==e&&(e=1e-4);if(e>0&&o>0){var r=o/2;f.lineWidth=r,f.strokeStyle="rgba(0,0,0,0.1)",i(t.datapoints,n,null,r+r/2,!0,t.xaxis,t.yaxis,a),f.strokeStyle="rgba(0,0,0,0.2)",i(t.datapoints,n,null,r/2,!0,t.xaxis,t.yaxis,a)}f.lineWidth=e,f.strokeStyle=t.color,i(t.datapoints,n,D(t.points,t.color),0,!1,t.xaxis,t.yaxis,a),f.restore()}(t)}function N(t,i,e,o,n,a,r,l,s,c,h){var f,u,d,p,m,x,g,b,v;c?(b=x=g=!0,m=!1,p=i+o,d=i+n,(u=t)<(f=e)&&(v=u,u=f,f=v,m=!0,x=!1)):(m=x=g=!0,b=!1,f=t+o,u=t+n,(p=i)<(d=e)&&(v=p,p=d,d=v,b=!0,g=!1)),u<r.min||f>r.max||p<l.min||d>l.max||(f<r.min&&(f=r.min,m=!1),u>r.max&&(u=r.max,x=!1),d<l.min&&(d=l.min,b=!1),p>l.max&&(p=l.max,g=!1),f=r.p2c(f),d=l.p2c(d),u=r.p2c(u),p=l.p2c(p),a&&(s.fillStyle=a(d,p),s.fillRect(f,p,u-f,d-p)),h>0&&(m||x||g||b)&&(s.beginPath(),s.moveTo(f,d),m?s.lineTo(f,p):s.moveTo(f,p),g?s.lineTo(u,p):s.moveTo(u,p),x?s.lineTo(u,d):s.moveTo(u,d),b?s.lineTo(f,d):s.moveTo(f,d),s.stroke()))}function D(i,e,o,n){var a=i.fill;if(!a)return null;if(i.fillColor)return Q(i.fillColor,o,n,e);var r=t.color.parse(e);return r.a="number"==typeof a?a:.4,r.normalize(),r.toString()}v.setData=y,v.setupGrid=z,v.draw=I,v.getPlaceholder=function(){return i},v.getCanvas=function(){return s.element},v.getPlotOffset=function(){return m},v.width=function(){return x},v.height=function(){return g},v.offset=function(){var t=h.offset();return t.left+=m.left,t.top+=m.top,t},v.getData=function(){return r},v.getAxes=function(){var i={};return t.each(d.concat(p),function(t,e){e&&(i[e.direction+(1!=e.n?e.n:"")+"axis"]=e)}),i},v.getXAxes=function(){return d},v.getYAxes=function(){return p},v.c2p=T,v.p2c=function(t){var i,e,o,n={};for(i=0;i<d.length;++i)if((e=d[i])&&e.used&&(o="x"+e.n,null==t[o]&&1==e.n&&(o="x"),null!=t[o])){n.left=e.p2c(t[o]);break}for(i=0;i<p.length;++i)if((e=p[i])&&e.used&&(o="y"+e.n,null==t[o]&&1==e.n&&(o="y"),null!=t[o])){n.top=e.p2c(t[o]);break}return n},v.getOptions=function(){return l},v.highlight=_,v.unhighlight=V,v.triggerRedrawOverlay=B,v.pointOffset=function(t){return{left:parseInt(d[w(t,"x")-1].p2c(+t.x)+m.left,10),top:parseInt(p[w(t,"y")-1].p2c(+t.y)+m.top,10)}},v.shutdown=S,v.destroy=function(){S(),i.removeData("plot").empty(),r=[],l=null,s=null,c=null,h=null,f=null,u=null,d=[],p=[],b=null,L=[],v=null},v.resize=function(){var t=i.width(),e=i.height();s.resize(t,e),c.resize(t,e)},v.hooks=b,function(){for(var i={Canvas:e},o=0;o<a.length;++o){var n=a[o];n.init(v,i),n.options&&t.extend(!0,l,n.options)}}(),function(e){t.extend(!0,l,e),e&&e.colors&&(l.colors=e.colors);null==l.xaxis.color&&(l.xaxis.color=t.color.parse(l.grid.color).scale("a",.22).toString());null==l.yaxis.color&&(l.yaxis.color=t.color.parse(l.grid.color).scale("a",.22).toString());null==l.xaxis.tickColor&&(l.xaxis.tickColor=l.grid.tickColor||l.xaxis.color);null==l.yaxis.tickColor&&(l.yaxis.tickColor=l.grid.tickColor||l.yaxis.color);null==l.grid.borderColor&&(l.grid.borderColor=l.grid.color);null==l.grid.tickColor&&(l.grid.tickColor=t.color.parse(l.grid.color).scale("a",.22).toString());var o,n,a,r=i.css("font-size"),s=r?+r.replace("px",""):13,c={style:i.css("font-style"),size:Math.round(.8*s),variant:i.css("font-variant"),weight:i.css("font-weight"),family:i.css("font-family")};for(a=l.xaxes.length||1,o=0;o<a;++o)(n=l.xaxes[o])&&!n.tickColor&&(n.tickColor=n.color),n=t.extend(!0,{},l.xaxis,n),l.xaxes[o]=n,n.font&&(n.font=t.extend({},c,n.font),n.font.color||(n.font.color=n.color),n.font.lineHeight||(n.font.lineHeight=Math.round(1.15*n.font.size)));for(a=l.yaxes.length||1,o=0;o<a;++o)(n=l.yaxes[o])&&!n.tickColor&&(n.tickColor=n.color),n=t.extend(!0,{},l.yaxis,n),l.yaxes[o]=n,n.font&&(n.font=t.extend({},c,n.font),n.font.color||(n.font.color=n.color),n.font.lineHeight||(n.font.lineHeight=Math.round(1.15*n.font.size)));l.xaxis.noTicks&&null==l.xaxis.ticks&&(l.xaxis.ticks=l.xaxis.noTicks);l.yaxis.noTicks&&null==l.yaxis.ticks&&(l.yaxis.ticks=l.yaxis.noTicks);l.x2axis&&(l.xaxes[1]=t.extend(!0,{},l.xaxis,l.x2axis),l.xaxes[1].position="top",null==l.x2axis.min&&(l.xaxes[1].min=null),null==l.x2axis.max&&(l.xaxes[1].max=null));l.y2axis&&(l.yaxes[1]=t.extend(!0,{},l.yaxis,l.y2axis),l.yaxes[1].position="right",null==l.y2axis.min&&(l.yaxes[1].min=null),null==l.y2axis.max&&(l.yaxes[1].max=null));l.grid.coloredAreas&&(l.grid.markings=l.grid.coloredAreas);l.grid.coloredAreasColor&&(l.grid.markingsColor=l.grid.coloredAreasColor);l.lines&&t.extend(!0,l.series.lines,l.lines);l.points&&t.extend(!0,l.series.points,l.points);l.bars&&t.extend(!0,l.series.bars,l.bars);null!=l.shadowSize&&(l.series.shadowSize=l.shadowSize);null!=l.highlightColor&&(l.series.highlightColor=l.highlightColor);for(o=0;o<l.xaxes.length;++o)C(d,o+1).options=l.xaxes[o];for(o=0;o<l.yaxes.length;++o)C(p,o+1).options=l.yaxes[o];for(var h in b)l.hooks[h]&&l.hooks[h].length&&(b[h]=b[h].concat(l.hooks[h]));k(b.processOptions,[l])}(n),function(){i.css("padding",0).children().filter(function(){return!t(this).hasClass("flot-overlay")&&!t(this).hasClass("flot-base")}).remove(),"static"==i.css("position")&&i.css("position","relative");s=new e("flot-base",i),c=new e("flot-overlay",i),f=s.context,u=c.context,h=t(c.element).unbind();var o=i.data("plot");o&&(o.shutdown(),c.clear());i.data("plot",v)}(),y(o),z(),I(),function(){l.grid.hoverable&&(h.mousemove(R),h.bind("mouseleave",H));l.grid.clickable&&h.click(j);k(b.bindEvents,[h])}();var L=[],O=null;function R(t){l.grid.hoverable&&E("plothover",t,function(t){return 0!=t.hoverable})}function H(t){l.grid.hoverable&&E("plothover",t,function(t){return!1})}function j(t){E("plotclick",t,function(t){return 0!=t.clickable})}function E(t,e,o){var n=h.offset(),a=e.pageX-n.left-m.left,s=e.pageY-n.top-m.top,c=T({left:a,top:s});c.pageX=e.pageX,c.pageY=e.pageY;var f=function(t,i,e){var o,n,a,s=l.grid.mouseActiveRadius,c=s*s+1,h=null;for(o=r.length-1;o>=0;--o)if(e(r[o])){var f=r[o],u=f.xaxis,d=f.yaxis,p=f.datapoints.points,m=u.c2p(t),x=d.c2p(i),g=s/u.scale,b=s/d.scale;if(a=f.datapoints.pointsize,u.options.inverseTransform&&(g=Number.MAX_VALUE),d.options.inverseTransform&&(b=Number.MAX_VALUE),f.lines.show||f.points.show)for(n=0;n<p.length;n+=a){var v=p[n],k=p[n+1];if(null!=v&&!(v-m>g||v-m<-g||k-x>b||k-x<-b)){var y=Math.abs(u.p2c(v)-t),w=Math.abs(d.p2c(k)-i),M=y*y+w*w;M<c&&(c=M,h=[o,n/a])}}if(f.bars.show&&!h){var T,C;switch(f.bars.align){case"left":T=0;break;case"right":T=-f.bars.barWidth;break;default:T=-f.bars.barWidth/2}for(C=T+f.bars.barWidth,n=0;n<p.length;n+=a){v=p[n],k=p[n+1];var S=p[n+2];null!=v&&(r[o].bars.horizontal?m<=Math.max(S,v)&&m>=Math.min(S,v)&&x>=k+T&&x<=k+C:m>=v+T&&m<=v+C&&x>=Math.min(S,k)&&x<=Math.max(S,k))&&(h=[o,n/a])}}}return h?(o=h[0],n=h[1],a=r[o].datapoints.pointsize,{datapoint:r[o].datapoints.points.slice(n*a,(n+1)*a),dataIndex:n,series:r[o],seriesIndex:o}):null}(a,s,o);if(f&&(f.pageX=parseInt(f.series.xaxis.p2c(f.datapoint[0])+n.left+m.left,10),f.pageY=parseInt(f.series.yaxis.p2c(f.datapoint[1])+n.top+m.top,10)),l.grid.autoHighlight){for(var u=0;u<L.length;++u){var d=L[u];d.auto!=t||f&&d.series==f.series&&d.point[0]==f.datapoint[0]&&d.point[1]==f.datapoint[1]||V(d.series,d.point)}f&&_(f.series,f.datapoint,t)}i.trigger(t,[c,f])}function B(){var t=l.interaction.redrawOverlayInterval;-1!=t?O||(O=setTimeout(G,t)):G()}function G(){var t,i;for(O=null,u.save(),c.clear(),u.translate(m.left,m.top),t=0;t<L.length;++t)(i=L[t]).series.bars.show?q(i.series,i.point):Y(i.series,i.point);u.restore(),k(b.drawOverlay,[u])}function _(t,i,e){if("number"==typeof t&&(t=r[t]),"number"==typeof i){var o=t.datapoints.pointsize;i=t.datapoints.points.slice(o*i,o*(i+1))}var n=X(t,i);-1==n?(L.push({series:t,point:i,auto:e}),B()):e||(L[n].auto=!1)}function V(t,i){if(null==t&&null==i)return L=[],void B();if("number"==typeof t&&(t=r[t]),"number"==typeof i){var e=t.datapoints.pointsize;i=t.datapoints.points.slice(e*i,e*(i+1))}var o=X(t,i);-1!=o&&(L.splice(o,1),B())}function X(t,i){for(var e=0;e<L.length;++e){var o=L[e];if(o.series==t&&o.point[0]==i[0]&&o.point[1]==i[1])return e}return-1}function Y(i,e){var o=e[0],n=e[1],a=i.xaxis,r=i.yaxis,l="string"==typeof i.highlightColor?i.highlightColor:t.color.parse(i.color).scale("a",.5).toString();if(!(o<a.min||o>a.max||n<r.min||n>r.max)){var s=i.points.radius+i.points.lineWidth/2;u.lineWidth=s,u.strokeStyle=l;var c=1.5*s;o=a.p2c(o),n=r.p2c(n),u.beginPath(),"circle"==i.points.symbol?u.arc(o,n,c,0,2*Math.PI,!1):i.points.symbol(u,o,n,c,!1),u.closePath(),u.stroke()}}function q(i,e){var o,n="string"==typeof i.highlightColor?i.highlightColor:t.color.parse(i.color).scale("a",.5).toString(),a=n;switch(i.bars.align){case"left":o=0;break;case"right":o=-i.bars.barWidth;break;default:o=-i.bars.barWidth/2}u.lineWidth=i.bars.lineWidth,u.strokeStyle=n,N(e[0],e[1],e[2]||0,o,o+i.bars.barWidth,function(){return a},i.xaxis,i.yaxis,u,i.bars.horizontal,i.bars.lineWidth)}function Q(i,e,o,n){if("string"==typeof i)return i;for(var a=f.createLinearGradient(0,o,0,e),r=0,l=i.colors.length;r<l;++r){var s=i.colors[r];if("string"!=typeof s){var c=t.color.parse(n);null!=s.brightness&&(c=c.scale("rgb",s.brightness)),null!=s.opacity&&(c.a*=s.opacity),s=c.toString()}a.addColorStop(r/(l-1),s)}return a}}t.fn.detach||(t.fn.detach=function(){return this.each(function(){this.parentNode&&this.parentNode.removeChild(this)})}),e.prototype.resize=function(t,i){if(t<=0||i<=0)throw new Error("Invalid dimensions for plot, width = "+t+", height = "+i);var e=this.element,o=this.context,n=this.pixelRatio;this.width!=t&&(e.width=t*n,e.style.width=t+"px",this.width=t),this.height!=i&&(e.height=i*n,e.style.height=i+"px",this.height=i),o.restore(),o.save(),o.scale(n,n)},e.prototype.clear=function(){this.context.clearRect(0,0,this.width,this.height)},e.prototype.render=function(){var t=this._textCache;for(var e in t)if(i.call(t,e)){var o=this.getTextLayer(e),n=t[e];for(var a in o.hide(),n)if(i.call(n,a)){var r=n[a];for(var l in r)if(i.call(r,l)){for(var s,c=r[l].positions,h=0;s=c[h];h++)s.active?s.rendered||(o.append(s.element),s.rendered=!0):(c.splice(h--,1),s.rendered&&s.element.detach());0==c.length&&delete r[l]}}o.show()}},e.prototype.getTextLayer=function(i){var e=this.text[i];return null==e&&(null==this.textContainer&&(this.textContainer=t("<div class='flot-text'></div>").css({position:"absolute",top:0,left:0,bottom:0,right:0,"font-size":"smaller",color:"#545454"}).insertAfter(this.element)),e=this.text[i]=t("<div></div>").addClass(i).css({position:"absolute",top:0,left:0,bottom:0,right:0}).appendTo(this.textContainer)),e},e.prototype.getTextInfo=function(i,e,o,n,a){var r,l,s,c;if(e=""+e,r="object"==typeof o?o.style+" "+o.variant+" "+o.weight+" "+o.size+"px/"+o.lineHeight+"px "+o.family:o,null==(l=this._textCache[i])&&(l=this._textCache[i]={}),null==(s=l[r])&&(s=l[r]={}),null==(c=s[e])){var h=t("<div></div>").html(e).css({position:"absolute","max-width":a,top:-9999}).appendTo(this.getTextLayer(i));"object"==typeof o?h.css({font:r,color:o.color}):"string"==typeof o&&h.addClass(o),c=s[e]={width:h.outerWidth(!0),height:h.outerHeight(!0),element:h,positions:[]},h.detach()}return c},e.prototype.addText=function(t,i,e,o,n,a,r,l,s){var c=this.getTextInfo(t,o,n,a,r),h=c.positions;"center"==l?i-=c.width/2:"right"==l&&(i-=c.width),"middle"==s?e-=c.height/2:"bottom"==s&&(e-=c.height);for(var f,u=0;f=h[u];u++)if(f.x==i&&f.y==e)return void(f.active=!0);f={active:!0,rendered:!1,element:h.length?c.element.clone():c.element,x:i,y:e},h.push(f),f.element.css({top:Math.round(e),left:Math.round(i),"text-align":l})},e.prototype.removeText=function(t,e,o,n,a,r){if(null==n){var l=this._textCache[t];if(null!=l)for(var s in l)if(i.call(l,s)){var c=l[s];for(var h in c)if(i.call(c,h))for(var f=c[h].positions,u=0;d=f[u];u++)d.active=!1}}else{var d;for(f=this.getTextInfo(t,n,a,r).positions,u=0;d=f[u];u++)d.x==e&&d.y==o&&(d.active=!1)}},t.plot=function(i,e,n){return new o(t(i),e,n,t.plot.plugins)},t.plot.version="0.8.3",t.plot.plugins=[],t.fn.plot=function(i,e){return this.each(function(){t.plot(this,i,e)})}}(jQuery);