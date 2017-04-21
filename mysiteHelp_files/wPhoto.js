define("wPhoto",["lodash","react","core","santaProps","utils","image","zoomedImage","imageClientApi"],function(a,b,c,d,e,f,g,h){"use strict";var i=e.linkRenderer;var j=c.compMixins;var k=1200;var l={fitWidthStrict:h.fittingTypes.LEGACY_FIT_WIDTH,fitHeightStrict:h.fittingTypes.LEGACY_FIT_HEIGHT};function m(a,b){return b&&(a==="goToLink"||!a)||a==="zoomMode"}function n(c,d,e,f,g,h,i,j,k){var l={style:{}};l.style.width=g.width;l.style.height=g.height;if(m(f,e)){l.style.cursor="pointer"}if(f==="zoomMode"){a.assign(l,j(k,h,c,null,d,null))}else if(e&&(f==="goToLink"||!f)){a.assign(l,i(e,k,h))}else{l.parentConst=b.DOM.div}return l}function o(a,b){return this.createChildComponent(this.props.compData,a,"img",b)}function p(a,b){return{id:a.id+"img",ref:"img",containerWidth:b.width,containerHeight:b.height,displayMode:l[a.compProp.displayMode]||a.compProp.displayMode,effectName:a.compProp.effectName,imageData:a.compData,addItemProp:a.addItemProp}}function q(b,c,d){var e;if(this.state.isInZoom){b.className=this.classSet({zoomedin:true});b.initialClickPosition=this.state.initialClickPosition;e=o.call(this,"core.components.ZoomedImage",b);c.onMouseLeave=u.bind(this);c.onMouseEnter=v.bind(this)}else{b.className=this.classSet({zoomedout:true});e=o.call(this,"core.components.Image",b);c.onMouseLeave=a.noop;c.onMouseEnter=a.noop}a.assign(d,c);return e}function r(a,b,c,d){var e=p(this.props,a);var f={onClick:t.bind(this)};if(!c||w(b,a)){return o.call(this,"core.components.Image",e)}return q.call(this,e,f,d)}function s(b,c,d,e){var f={style:a.cloneDeep(b)};f.style.width=c.width;f.style.height=c.height;f["data-exact-height"]=c.exactHeight;f["data-content-padding-horizontal"]=d.contentPaddingHorizontal;f["data-content-padding-vertical"]=d.contentPaddingVertical;f.title=e;return f}function t(a){var b=this;var c=this.state.isInZoom;this.registerReLayout();if(c){this.refs.img.zoomOut(function(){b.setState({isInZoom:!c})})}else{this.setState({isInZoom:!c,initialClickPosition:{clientX:a.clientX,clientY:a.clientY}})}}function u(a){var b=this;v.call(this);this.zoomTimer=setTimeout(function(){t.apply(b,[a])},k)}function v(){clearTimeout(this.zoomTimer)}function w(a,b){return a.width<b.width||a.height<b.height}function x(a,b){var c={};var d=parseInt(a.contentPaddingLeft.value||0,10)+parseInt(b.contentPaddingLeft||0,10);var e=parseInt(a.contentPaddingRight.value||0,10)+parseInt(b.contentPaddingRight||0,10);var f=parseInt(a.contentPaddingTop.value||0,10)+parseInt(b.contentPaddingTop||0,10);var g=parseInt(a.contentPaddingBottom.value||0,10)+parseInt(b.contentPaddingBottom||0,10);c.contentPaddingHorizontal=d+e;c.contentPaddingVertical=f+g;return c}function y(a,b){var c=a.width-b.contentPaddingHorizontal,d=a.height-b.contentPaddingVertical;return{width:c>0?c:16,height:d>0?d:16}}function z(a,b){return{width:a.width+b.contentPaddingHorizontal,height:a.height+b.contentPaddingVertical,exactHeight:(a.exactHeight||a.height)+b.contentPaddingVertical}}return{displayName:"WPhoto",propTypes:a.assign({id:d.Types.Component.id,compData:d.Types.Component.compData.isRequired,compProp:d.Types.Component.compProp.isRequired,structure:d.Types.Component.structure,linkRenderInfo:d.Types.Link.linkRenderInfo.isRequired,rootNavigationInfo:d.Types.Component.rootNavigationInfo.isRequired},d.santaTypesUtils.getSantaTypesByDefinition(f),d.santaTypesUtils.getSantaTypesByDefinition(g)),statics:{useSantaTypes:true},mixins:[j.skinBasedComp,j.skinInfo,j.animationsMixin],getInitialState:function(){this.zoomTimer=null;return{isInZoom:false}},getSkinProperties:function(){var b=this.props.structure.propertyQuery;var c=this.props.compData.link||null;var d=this.props.compProp.onClickBehavior;var f=this.props.compProp.displayMode;var g=a.pick(this.props.style,["width","height"]);var h={width:this.props.compData.width,height:this.props.compData.height};var j=x(this.getParams(["contentPaddingLeft","contentPaddingRight","contentPaddingBottom","contentPaddingTop"]),this.getSkinExports());var k=e.imageUtils.getContainerSize(y(g,j),h,l[f]||f);var m=z(k,j);var o=s(this.props.style,m,j,this.props.compData.title);var p=r.call(this,k,h,d==="zoomAndPanMode",o);var q=n(this.props.compData,b,c,d,k,this.props.rootNavigationInfo,i.renderLink,i.renderImageZoomLink,this.props.linkRenderInfo);return{"":o,img:p,link:q}},getDefaultSkinName:function(){return"wysiwyg.viewer.skins.photo.DefaultPhoto"}}});