define("infoTip/utils/infoTipUtils",["zepto"],function(a){"use strict";function b(a){return a.offset()}function c(a,b){return{top:a.top-b.height,left:a.left-b.width/2,right:"auto"}}function d(b,c,d,e){var f=a(window.document.body).scrollTop(),g=b-f<0,h;if(g){h=c.top+e.height;if(h>d+f+e.height){if(c.top<0){h=c.top}else{h=f}}return h>0?h:0}return b}function e(a,b,c,d){if(b>d){return"auto"}return a<0?c.left:a}function f(a,b,c){return a>c?b.left+b.width:a}function g(a,b,c){var g=window.innerWidth,h=window.innerHeight;return{top:d(a.top,b,h,c),left:e(a.left,a.right,b),right:f(a.right,b,g)}}function h(a,b){var c=0,d=0,e,f=b.offsetParent();if(f){e=f.offset();c=e.top;d=e.left}return{top:a.top-c,left:a.left-d,right:a.right==="auto"?a.right:a.right+d}}function i(d,e){var f,i,j;d=a(d);e=a(e);j={width:e.width(),height:e.height()};f=b(d);i=c(f,j);i=g(i,f,j);i=h(i,e);return i}return{getPosition:i}});define("infoTip",["lodash","utils","core","santaProps","infoTip/utils/infoTipUtils","reactDOM"],function(a,b,c,d,e,f){"use strict";var g=c.compMixins;var h=b.style.assignStyle;var i=150,j=500,k=3e3;function l(){o.call(this)}function m(){this.setTimeoutNamed("closeTipByTimeout",l.bind(this),k)}function n(a,b){p.call(this,f.findDOMNode(b.source))}function o(){this.clearTimeoutNamed("openTip");this.setState({$hidden:"hidden",runTimer:true})}function p(a){this.setState({$hidden:"",isShown:true,caller:a});m.call(this)}function q(){var b,c;if(this.state.isShown){b=f.findDOMNode(this);c=e.getPosition(this.state.caller,b);h(b,a.pick(c,["top","left","right"]))}}function r(b){return b&&a.isEmpty(b.description)}return{displayName:"InfoTip",mixins:[g.skinBasedComp,g.timeoutsMixin],propTypes:{compData:d.Types.Component.compData.isRequired},statics:{useSantaTypes:true},onMouseEnter:function(){this._isMouseInside=true},onMouseLeave:function(){this._isMouseInside=false;o.call(this)},showToolTip:function(a,b){if(r(b.source.props.compData)){return}this.clearTimeoutNamed("hideTipByClose");this.setTimeoutNamed("openTip",function(){n.call(this,a,b)}.bind(this),j)},closeToolTip:function(){this.setTimeoutNamed("hideTipByClose",function(){if(!this._isMouseInside){o.call(this)}}.bind(this),i)},getSkinProperties:function(){return{content:{children:[this.props.compData.content]}}},componentDidUpdate:function(){q.call(this)},getInitialState:function(){return{$hidden:"hidden",isMouseInside:false}}}});