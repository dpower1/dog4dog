define("mediaContainerFactory",["react","lodash","core","backgroundCommon","compDesignUtils","santaProps","mediaCommon"],function(a,b,c,d,e,f,g){"use strict";var h=g.mediaLogicMixins.fill;function i(b){return{displayName:b||"MediaContainer",mixins:[h,c.compMixins.skinBasedComp,d.mixins.backgroundDetectionMixin],propTypes:{style:f.Types.Component.style.isRequired,compDesign:f.Types.Component.compDesign,rootStyle:a.PropTypes.object,bgStyle:a.PropTypes.object,inlineStyle:a.PropTypes.object},statics:{useSantaTypes:true,behaviors:g.mediaBehaviors.fill},getDefaultSkinName:function(){return"wysiwyg.viewer.skins.mediaContainer.DefaultMediaContainer"},getSkinProperties:function(){var a=this.props.rootStyle||this.props.style;var b=this.props.bgStyle||g.defaultMediaStyle;var c=this.props.inlineStyle||{width:a.width,position:"absolute",top:0,bottom:0};return{"":{style:a},background:this.createFillLayers(),container:{style:e.getContainerStyle(this.props.compDesign)},inlineContentParent:{style:b},inlineContent:{style:c,children:this.props.children}}}}}return{createMediaContainer:i}});