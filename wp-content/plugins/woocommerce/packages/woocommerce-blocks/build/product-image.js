(self.webpackChunkwebpackWcBlocksJsonp=self.webpackChunkwebpackWcBlocksJsonp||[]).push([[3706,5432],{9382:(e,t,o)=>{"use strict";o.d(t,{Z:()=>l});const l={showProductLink:{type:"boolean",default:!0},showSaleBadge:{type:"boolean",default:!0},saleBadgeAlign:{type:"string",default:"right"},imageSizing:{type:"string",default:o(9252).R.SINGLE},productId:{type:"number",default:0},isDescendentOfQueryLoop:{type:"boolean",default:!1},isDescendentOfSingleProductBlock:{type:"boolean",default:!1},width:{type:"string"},height:{type:"string"},scale:{type:"string",default:"cover"},aspectRatio:{type:"string"}}},1492:(e,t,o)=>{"use strict";o.d(t,{Z:()=>y});var l=o(9307),n=o(5736),s=o(4184),a=o.n(s),c=o(4617),r=o(2864),i=o(3611),u=o(721),d=o(5918),g=o(4498),m=(o(8854),o(9252));const p=e=>(0,l.createElement)("img",{...e,src:c.PLACEHOLDER_IMG_SRC,alt:"",width:void 0,height:void 0}),h=({image:e,loaded:t,showFullSize:o,fallbackAlt:n,width:s,scale:a,height:c,aspectRatio:r})=>{const{thumbnail:i,src:u,srcset:d,sizes:g,alt:m}=e||{},h={alt:m||n,hidden:!t,src:i,...o&&{src:u,srcSet:d,sizes:g}},y={height:c,width:s,objectFit:a,aspectRatio:r};return(0,l.createElement)(l.Fragment,null,h.src&&(0,l.createElement)("img",{style:y,"data-testid":"product-image",...h}),!e&&(0,l.createElement)(p,{style:y}))},y=(0,u.withProductDataContext)((e=>{const{className:t,imageSizing:o=m.R.SINGLE,showProductLink:s=!0,showSaleBadge:c,saleBadgeAlign:u="right",height:y,width:f,scale:b,aspectRatio:v,...k}=e,w=(0,i.F)(e),{parentClassName:S}=(0,r.useInnerBlockLayoutContext)(),{product:N,isLoading:C}=(0,r.useProductDataContext)(),{dispatchStoreEvent:_}=(0,d.n)();if(!N.id)return(0,l.createElement)("div",{className:a()(t,"wc-block-components-product-image",{[`${S}__product-image`]:S},w.className),style:w.style},(0,l.createElement)(p,null));const E=!!N.images.length,x=E?N.images[0]:null,F=s?"a":l.Fragment,L=(0,n.sprintf)(/* translators: %s is referring to the product name */
(0,n.__)("Link to %s","woocommerce"),N.name),R={href:N.permalink,...!E&&{"aria-label":L},onClick:()=>{_("product-view-link",{product:N})}};return(0,l.createElement)("div",{className:a()(t,"wc-block-components-product-image",{[`${S}__product-image`]:S},w.className),style:w.style},(0,l.createElement)(F,{...s&&R},!!c&&(0,l.createElement)(g.default,{align:u,...k}),(0,l.createElement)(h,{fallbackAlt:N.name,image:x,loaded:!C,showFullSize:o!==m.R.THUMBNAIL,width:f,height:y,scale:b,aspectRatio:v})))}))},2097:(e,t,o)=>{"use strict";o.r(t),o.d(t,{default:()=>a});var l=o(721),n=o(1492),s=o(9382);const a=(0,l.withFilteredAttributes)(s.Z)(n.Z)},4498:(e,t,o)=>{"use strict";o.r(t),o.d(t,{Block:()=>d,default:()=>g});var l=o(9307),n=o(5736),s=o(4184),a=o.n(s),c=o(711),r=o(2864),i=o(3611),u=o(721);o(1314);const d=e=>{const{className:t,align:o}=e,s=(0,i.F)(e),{parentClassName:u}=(0,r.useInnerBlockLayoutContext)(),{product:d}=(0,r.useProductDataContext)();if(!(d.id&&d.on_sale||e.isDescendentOfSingleProductTemplate))return null;const g="string"==typeof o?`wc-block-components-product-sale-badge--align-${o}`:"";return(0,l.createElement)("div",{className:a()("wc-block-components-product-sale-badge",t,g,{[`${u}__product-onsale`]:u},s.className),style:s.style},(0,l.createElement)(c.Label,{label:(0,n.__)("Sale","woocommerce"),screenReaderLabel:(0,n.__)("Product on sale","woocommerce")}))},g=(0,u.withProductDataContext)(d)},5918:(e,t,o)=>{"use strict";o.d(t,{n:()=>a});var l=o(2694),n=o(9818),s=o(9307);const a=()=>({dispatchStoreEvent:(0,s.useCallback)(((e,t={})=>{try{(0,l.doAction)(`experimental__woocommerce_blocks-${e}`,t)}catch(e){console.error(e)}}),[]),dispatchCheckoutEvent:(0,s.useCallback)(((e,t={})=>{try{(0,l.doAction)(`experimental__woocommerce_blocks-checkout-${e}`,{...t,storeCart:(0,n.select)("wc/store/cart").getCartData()})}catch(e){console.error(e)}}),[])})},3611:(e,t,o)=>{"use strict";o.d(t,{F:()=>i});var l=o(4184),n=o.n(l),s=o(7884),a=o(2646),c=o(1473),r=o(2661);const i=e=>{const t=(e=>{const t=(0,s.Kn)(e)?e:{style:{}};let o=t.style;return(0,a.H)(o)&&(o=JSON.parse(o)||{}),(0,s.Kn)(o)||(o={}),{...t,style:o}})(e),o=(0,r.vc)(t),l=(0,r.l8)(t),i=(0,r.su)(t),u=(0,c.f)(t);return{className:n()(u.className,o.className,l.className,i.className),style:{...u.style,...o.style,...l.style,...i.style}}}},1473:(e,t,o)=>{"use strict";o.d(t,{f:()=>s});var l=o(7884),n=o(2646);const s=e=>{const t=(0,l.Kn)(e.style.typography)?e.style.typography:{},o=(0,n.H)(t.fontFamily)?t.fontFamily:"";return{className:e.fontFamily?`has-${e.fontFamily}-font-family`:o,style:{fontSize:e.fontSize?`var(--wp--preset--font-size--${e.fontSize})`:t.fontSize,fontStyle:t.fontStyle,fontWeight:t.fontWeight,letterSpacing:t.letterSpacing,lineHeight:t.lineHeight,textDecoration:t.textDecoration,textTransform:t.textTransform}}}},2661:(e,t,o)=>{"use strict";o.d(t,{l8:()=>d,su:()=>g,vc:()=>u});var l=o(4184),n=o.n(l),s=o(9784),a=o(2289),c=o(7884);function r(e={}){const t={};return(0,a.getCSSRules)(e,{selector:""}).forEach((e=>{t[e.key]=e.value})),t}function i(e,t){return e&&t?`has-${(0,s.o)(t)}-${e}`:""}function u(e){var t,o,l,s,a,u,d;const{backgroundColor:g,textColor:m,gradient:p,style:h}=e,y=i("background-color",g),f=i("color",m),b=function(e){if(e)return`has-${e}-gradient-background`}(p),v=b||(null==h||null===(t=h.color)||void 0===t?void 0:t.gradient);return{className:n()(f,b,{[y]:!v&&!!y,"has-text-color":m||(null==h||null===(o=h.color)||void 0===o?void 0:o.text),"has-background":g||(null==h||null===(l=h.color)||void 0===l?void 0:l.background)||p||(null==h||null===(s=h.color)||void 0===s?void 0:s.gradient),"has-link-color":(0,c.Kn)(null==h||null===(a=h.elements)||void 0===a?void 0:a.link)?null==h||null===(u=h.elements)||void 0===u||null===(d=u.link)||void 0===d?void 0:d.color:void 0}),style:r({color:(null==h?void 0:h.color)||{}})}}function d(e){var t;const o=(null===(t=e.style)||void 0===t?void 0:t.border)||{};return{className:function(e){var t;const{borderColor:o,style:l}=e,s=o?i("border-color",o):"";return n()({"has-border-color":!!o||!(null==l||null===(t=l.border)||void 0===t||!t.color),[s]:!!s})}(e),style:r({border:o})}}function g(e){var t;return{className:void 0,style:r({spacing:(null===(t=e.style)||void 0===t?void 0:t.spacing)||{}})}}},8519:(e,t,o)=>{"use strict";o.d(t,{F:()=>l});const l=e=>null===e},7884:(e,t,o)=>{"use strict";o.d(t,{$n:()=>s,Kn:()=>n,Qr:()=>a});var l=o(8519);const n=e=>!(0,l.F)(e)&&e instanceof Object&&e.constructor===Object;function s(e,t){return n(e)&&t in e}const a=e=>0===Object.keys(e).length},2646:(e,t,o)=>{"use strict";o.d(t,{H:()=>l});const l=e=>"string"==typeof e},8854:()=>{},1314:()=>{}}]);