define("mediaPlayer",["lodash","react","core","compDesignUtils","santaProps","mediaCommon"],function(a,b,c,d,e,f){"use strict";var g=f.mediaLogicMixins.mediaPlayer;var h=c.compMixins.timeoutsMixin;var i=2e3;function j(c,d){return b.Children.map(c.children,function(e){return b.cloneElement(e,{playerInteraction:c.compProp.playerInteraction,playerInHoverState:d.hover,playerInTimedHoverState:d.timedHover,compProp:a.defaults({playerId:c.id},e.props.compProp)})})}return{displayName:"MediaPlayer",mixins:[c.compMixins.skinBasedComp,g,h],propTypes:a.defaults({style:e.Types.Component.style.isRequired,compDesign:e.Types.Component.compDesign,compProp:e.Types.Component.compProp}),statics:{useSantaTypes:true,behaviors:f.mediaBehaviors.mediaPlayer},getInitialState:function(){return{hover:false,timedHover:false}},toggleHover:function(a){this.setState({hover:a.type==="mouseenter"})},setTimedHover:function(){this.setState({timedHover:true});this.setTimeout(this.removeTimedHover,i)},removeTimedHover:function(){this.setState({timedHover:false})},handleHoverAction:function(a){this.toggleHover(a);switch(a.type){case"mouseenter":if(this.props.playerInteraction==="playOnHover"){this.playMedia()}else if(this.props.playerInteraction==="pauseOnHover"){this.pauseMedia()}break;case"mouseleave":if(this.props.playerInteraction==="playOnHover"){this.pauseMedia()}else if(this.props.playerInteraction==="pauseOnHover"){this.playMedia()}break}},getSkinProperties:function(){var a={"":{style:this.props.style},background:this.createFillLayers(),container:{className:this.classSet({"interactive-player":this.props.playerInteraction!=="none"}),style:d.getContainerStyle(this.props.compDesign),onMouseEnter:this.handleHoverAction,onMouseLeave:this.handleHoverAction,onMouseMove:this.setTimedHover},inlineContentParent:{style:{pointerEvents:b.Children.count(this.props.children)>0?"auto":"none"}},inlineContent:{children:j(this.props,this.state)}};if(this.props.compProp.playerInteraction==="click"){a.container.onClick=this.togglePlayMedia}return a}}});