define("mediaControls/mediaOverlayControls/mediaOverlayControls",["lodash","react","core","utils","santaProps","svgCommon"],function(a,b,c,d,e,f){"use strict";var g=d.mediaConsts;var h=f.transformToTintColors;return{displayName:"MediaOverlayControls",mixins:[c.compMixins.skinBasedComp],propTypes:{compProp:e.Types.Component.compProp,mediaAspect:e.Types.SiteAspects.mediaAspect.isRequired,handleBehavior:e.Types.Behaviors.handleBehavior.isRequired,iconsDescriptor:e.Types.MediaControls.iconsDescriptor,THEME_DATA:e.Types.Theme.THEME_DATA,componentViewMode:e.Types.RenderFlags.componentViewMode,playerInteraction:b.PropTypes.string,playerInHoverState:b.PropTypes.bool},statics:{useSantaTypes:true},getDefaultProps:function(){return{playerInteraction:"click",playerInHoverState:false}},getInitialState:function(){return{playbackState:g.playbackTypes.WAITING,showReplay:false,showPlay:true}},componentDidMount:function(){if(this.props.compProp.playerId){this.props.mediaAspect.registerStateChange(this.props.id,this.props.compProp.playerId,this.onStateChange)}},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.compProp.playerId)},componentWillReceiveProps:function(a){var b=this.props.compProp.playerId;var c=a.compProp.playerId;if(b!==c){this.props.mediaAspect.unregisterStateChange(this.props.id,b)}if(c){this.props.mediaAspect.registerStateChange(this.props.id,c,this.onStateChange)}if(a.componentViewMode==="editor"){this.setState({showReplay:false,showPlay:true})}},onStateChange:function(b){var c={};if(this.state.playbackState!==b.playbackState){c.playbackState=b.playbackState}if(this.state.showPlay&&b.currentTime>0){c.showPlay=false}if(b.currentTime>=b.duration){c.showReplay=true}else if(this.state.showReplay){c.showReplay=false}if(!a.isEmpty(c)){this.setState(c)}},clickAction:function(){var a=this.state.playbackState===g.playbackTypes.PLAYING;if(!(this.state.showPlay||this.state.showReplay)){this.setState({showPauseIndicator:a,showPlayIndicator:!a})}else{this.setState({showPauseIndicator:false,showPlayIndicator:false})}},getIconSymbolName:function(){var a=this.props.playerInteraction;if(this.state.showPlay){return"playButton"}else if(this.state.showReplay){return"replayButton"}else if(this.state.showPlayIndicator&&a==="click"){return"playIndication"}else if(this.state.showPauseIndicator&&a==="click"){return"pauseIndication"}return null},getIconComponent:function(){var b=this.getIconSymbolName();if(!b){return null}var c={skin:"skins.viewer.svgPrimitive.SvgPrimitiveDefaultSkin",styleId:this.props.styleId+"_"+b};var e=a.get(this.props,["compTheme","style","properties","fillcolor"]);var f=d.colorParser.getColorValue(this.props.THEME_DATA,e);var g=h(this.props.iconsDescriptor[b],f);var i={id:this.props.id+"indicator",key:b,ref:"indicator",svgString:g,className:this.classSet({indicator:true,hover:this.props.playerInHoverState})};return this.createChildComponent(this.props.compData,"wysiwyg.viewer.components.svgPrimitive",c,i)},getCatcherProperties:function(){var a={};if(this.props.playerInteraction==="click"){a.onClick=this.clickAction}return a},getSkinProperties:function(){return{"":{style:this.props.style,"data-player-id":this.props.compProp.playerId,"data-mode":this.props.componentViewMode},indicator:this.getIconComponent(),catcher:this.getCatcherProperties()}}}});define("mediaControls/mediaControlPlay/mediaControlPlay",["react","core","utils","santaProps"],function(a,b,c,d){"use strict";var e=c.mediaConsts;function f(a){return a===e.playbackTypes.PLAYING||a===e.playbackTypes.SEEK_PLAYING}function g(a){return f(a)?"pause":"play"}return{displayName:"MediaControlPlay",mixins:[b.compMixins.skinBasedComp],propTypes:{style:a.PropTypes.object,playerId:a.PropTypes.string.isRequired,iconsDescriptor:a.PropTypes.object,mediaAspect:d.Types.SiteAspects.mediaAspect.isRequired,handleBehavior:d.Types.Behaviors.handleBehavior.isRequired},statics:{useSantaTypes:true},getInitialState:function(){return{playbackState:e.playbackTypes.WAITING}},componentDidMount:function(){this.props.mediaAspect.registerStateChange(this.props.id,this.props.playerId,this.setPlaybackState)},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.playerId)},setPlaybackState:function(a){if(this.state.playbackState!==a.playbackState){this.setState({playbackState:a.playbackState})}},clickAction:function(){this.props.handleBehavior({type:"comp",targetId:this.props.playerId,name:g(this.state.playbackState)})},getIconComponent:function(a){var b={skin:"skins.viewer.svgPrimitive.SvgPrimitiveDefaultSkin",styleId:this.props.styleId+"_"+a};var c={id:this.props.id+"icon",ref:"icon",svgString:this.props.iconsDescriptor[a]};return this.createChildComponent(this.props.compData,"wysiwyg.viewer.components.svgPrimitive",b,c)},getSkinProperties:function(){return{"":{style:this.props.style},playButton:{children:this.getIconComponent(g(this.state.playbackState)),onClick:this.clickAction}}}}});define("mediaControls/mediaControlFullscreen/mediaControlFullscreen",["react","core","santaProps"],function(a,b,c){"use strict";function d(a){return a?"exitFullscreen":"fullscreen"}return{displayName:"MediaControlFullscreen",mixins:[b.compMixins.skinBasedComp],propTypes:{style:a.PropTypes.object,playerId:a.PropTypes.string.isRequired,enableFullsceen:a.PropTypes.bool,mediaAspect:c.Types.SiteAspects.mediaAspect.isRequired,handleBehavior:c.Types.Behaviors.handleBehavior.isRequired},statics:{useSantaTypes:true},getInitialState:function(){return{fullscreen:false}},componentDidMount:function(){this.props.mediaAspect.registerStateChange(this.props.id,this.props.playerId,this.setFullscreenState)},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.playerId)},setFullscreenState:function(a){if(this.state.fullscreen!==a.fullscreen){this.setState({fullscreen:a.fullscreen})}},clickAction:function(){this.props.handleBehavior({type:"comp",targetId:this.props.playerId,name:this.state.fullscreen?"exitFullscreen":"enterFullscreen"})},getIconComponent:function(a){var b={skin:"skins.viewer.svgPrimitive.SvgPrimitiveDefaultSkin",styleId:this.props.styleId+"_"+a};var c={id:this.props.id+"icon",ref:"icon",svgString:this.props.iconsDescriptor[a]};return this.createChildComponent(this.props.compData,"wysiwyg.viewer.components.svgPrimitive",b,c)},getSkinProperties:function(){var a={"":{style:this.props.style},fullscreenButton:{children:this.getIconComponent(d(this.state.fullscreen)),className:this.classSet({"video-fullscreen":this.state.fullscreen,"video-windowed":!this.state.fullscreen,disabled:!this.props.enableFullsceen})}};if(this.props.enableFullsceen){a.fullscreenButton.onClick=this.clickAction}return a}}});define("mediaControls/mediaControlVolume/mediaControlVolume",["lodash","react","core","coreUtils","santaProps"],function(a,b,c,d,e){"use strict";var f=d.SimpleDrag;function g(a){return a?"volumeOff":"volumeOn"}return{displayName:"MediaControlVolume",mixins:[c.compMixins.skinBasedComp],propTypes:{style:b.PropTypes.object,playerId:b.PropTypes.string.isRequired,mediaAspect:e.Types.SiteAspects.mediaAspect.isRequired,handleBehavior:e.Types.Behaviors.handleBehavior.isRequired},statics:{useSantaTypes:true},getInitialState:function(){this.isDragging=false;return{muted:false,volume:0}},componentDidMount:function(){this.props.mediaAspect.registerStateChange(this.props.id,this.props.playerId,this.setVolumeState)},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.playerId)},setVolumeState:function(a){if(!this.isDragging&&(this.state.volume!==a.volume||this.state.muted!==a.muted)){this.setState({muted:a.muted,volume:a.volume})}},clickActionMute:function(){var a=this.state.muted?"unMute":"mute";this.props.handleBehavior({type:"comp",targetId:this.props.playerId,name:a})},setVolumeOnSeek:function(a){this.props.handleBehavior({type:"comp",targetId:this.props.playerId,name:"setVolume",params:{volume:a.endX/a.maxX}})},onDragStart:function(a,b){this.isDragging=true;this.refs.volumeBarActive.style.width=b.endX/b.maxX*100+"%";this.setVolumeOnSeek(b)},onDrag:function(a,b){this.refs.volumeBarActive.style.width=b.endX/b.maxX*100+"%";this.setVolumeOnSeek(b)},onDragEnd:function(a,b){this.isDragging=false;this.setVolumeOnSeek(b)},volumeSeekStart:function(a){var b=f({onDragStart:this.onDragStart,onDragEnd:this.onDragEnd,onDrag:this.onDrag,minX:0,maxX:a.target.offsetWidth,offsetX:a.nativeEvent.layerX});b.start(a)},getIconComponent:function(a){var b={skin:"skins.viewer.svgPrimitive.SvgPrimitiveDefaultSkin",styleId:this.props.styleId+"_"+a};var c={id:this.props.id+"icon",ref:"icon",svgString:this.props.iconsDescriptor[a]};return this.createChildComponent(this.props.compData,"wysiwyg.viewer.components.svgPrimitive",b,c)},getSkinProperties:function(){var b={"":{style:this.props.style},volume:{className:this.classSet({muted:this.state.muted})},mute:{children:this.getIconComponent(g(this.state.muted)),onClick:this.clickActionMute},volumeBarActive:{style:{width:this.state.volume*100+"%"}}};if(!this.state.muted){a.assign(b,{volumeBarDragArea:{onMouseDown:this.volumeSeekStart}})}return b}}});define("mediaControls/mediaControlStoryboard/mediaControlStoryboard",["lodash","react","core","santaProps"],function(a,b,c,d){"use strict";function e(a){var b=new Date(a*1e3);var c=b.getUTCHours();var d=b.getUTCMinutes();var e=b.getUTCSeconds();if(e<10){e="0"+e}if(c){if(d<10){d="0"+d}return c+":"+d+":"+e}return d+":"+e}return{displayName:"MediaControlStoryboard",mixins:[c.compMixins.skinBasedComp],propTypes:{style:b.PropTypes.object,videoId:b.PropTypes.string,serviceTopologyStaticVideoUrl:d.Types.ServiceTopology.staticVideoUrl,getMediaQualityState:d.Types.Media.getMediaQualityState,visible:b.PropTypes.bool,showVideo:b.PropTypes.bool},statics:{useSantaTypes:true},componentWillUpdate:function(b){if(this.props.showVideo&&b.videoId){var c=this.props.getMediaQualityState(b.videoId);var d=a.get(c,"storyboardUrl");if(d){this.storyboardUrl=this.props.serviceTopologyStaticVideoUrl+d}}},componentDidUpdate:function(a,b){if(this.props.showVideo){var c=this.refs.video;if(this.storyboardUrl!==c.currentSrc){c.load()}if(c&&b.time!==this.state.time){c.currentTime=this.state.time}}},getInitialState:function(){this.storyboardUrl="";return{time:0,left:0}},getSkinProperties:function(){var c=this.props.visible?{display:"block"}:{display:"none"};var d=a.defaults({left:this.state.left},this.props.style,c);if(this.props.showVideo){return{"":{style:d},video:{},mediaSource:{src:this.storyboardUrl},label:{children:[b.createElement("span",null,e(this.state.time))]}}}return{"":{style:d},label:{children:[b.createElement("span",null,e(this.state.time))]}}}}});define("mediaControls/mediaControlProgress/mediaControlProgress",["lodash","react","core","coreUtils","santaProps","mediaControls/mediaControlStoryboard/mediaControlStoryboard"],function(a,b,c,d,e,f){"use strict";var g=d.mediaConsts;var h=d.SimpleDrag;var i=[g.playbackTypes.SEEK_PLAYING,g.playbackTypes.SEEK_PAUSED,g.playbackTypes.SEEKING];function j(b){return a.includes(i,b)}return{displayName:"MediaControlProgress",mixins:[c.compMixins.skinBasedComp],propTypes:a.defaults({style:b.PropTypes.object,playerId:b.PropTypes.string.isRequired,mediaAspect:e.Types.SiteAspects.mediaAspect.isRequired,handleBehavior:e.Types.Behaviors.handleBehavior.isRequired,showStoryboard:b.PropTypes.string},e.santaTypesUtils.getSantaTypesByDefinition(f)),statics:{useSantaTypes:true},getInitialState:function(){this.isDragging=false;return{playbackState:g.playbackTypes.WAITING,currentTime:0,progress:0,duration:0,showStoryboard:false}},getDefaultProps:function(){return{showVideoInStoryboard:true}},componentDidMount:function(){this.props.mediaAspect.registerStateChange(this.props.id,this.props.playerId,this.setState.bind(this))},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.playerId)},onSeekStart:function(a,b){this.isDragging=true;this.refs.playHead.style.left=b.endX/b.maxX*100+"%";this.props.handleBehavior({type:"comp",targetId:this.props.playerId,name:"seekStart"})},onSeekEnd:function(a,b){var c=b.endX/b.maxX*this.state.duration;this.props.handleBehavior({type:"comp",targetId:this.props.playerId,name:"seekEnd",params:{time:c}});this.isDragging=false},onSeek:function(a,b){this.refs.playHead.style.left=b.endX/b.maxX*100+"%"},seekStartDrag:function(a){var b=h({onDragStart:this.onSeekStart,onDragEnd:this.onSeekEnd,onDrag:this.onSeek,minX:0,maxX:a.target.offsetWidth,offsetX:a.nativeEvent.layerX});b.start(a)},getStoryboardComp:function(){var a="wysiwyg.viewer.components.MediaControlStoryboard";var b="storyboard";var c=this.props.showStoryboard==="videoAndTime";var d=c?b:b+"Minimal";var e={ref:b,id:this.props.id+b,videoId:this.state.videoId,visible:this.state.showStoryboard,showVideo:c};return this.createChildComponent(null,a,d,e)},onStoryboardStart:function(){this.setState({showStoryboard:true})},onStoryboardEnd:function(){this.setState({showStoryboard:false})},onStoryboardScrub:function(a,b){var c=this.refs.storyboard;c.setState({left:b.endX,time:b.endX/b.maxX*this.state.duration})},storyboardStartScrub:function(a){var b=h({onDragStart:this.onStoryboardStart,onDragEnd:this.onStoryboardEnd,onDrag:this.onStoryboardScrub,minX:0,maxX:a.target.offsetWidth,offsetX:a.clientX-a.currentTarget.getBoundingClientRect().left});b.start(a)},getPlayHeadPosition:function(){return this.isDragging||j(this.state.playbackState)?this.refs.playHead.style.left:this.state.currentTime/this.state.duration*100+"%"},getIconComponent:function(a){var b={skin:"skins.viewer.svgPrimitive.SvgPrimitiveDefaultSkin",styleId:this.props.styleId+"_"+a};var c={id:this.props.id+"icon",ref:"icon",svgString:this.props.iconsDescriptor[a]};return this.createChildComponent(this.props.compData,"wysiwyg.viewer.components.svgPrimitive",b,c)},getSkinProperties:function(){var a=this.getPlayHeadPosition();var b={"":{style:this.props.style},progressDragArea:{onMouseDown:this.seekStartDrag,onMouseEnter:this.storyboardStartScrub},progressLoad:{style:{width:this.state.progress/this.state.duration*100+"%"}},progressPlay:{style:{width:this.state.currentTime/this.state.duration*100+"%"}},playHead:{children:this.getIconComponent("playhead"),style:{left:a},className:this.classSet({"play-head-animate":!this.isDragging})},storyboard:this.getStoryboardComp()};return b}}});define("mediaControls/mediaControlTime/mediaControlTime",["react","core","santaProps"],function(a,b,c){"use strict";function d(a){var b=new Date(a*1e3);var c=b.getUTCHours();var d=b.getUTCMinutes();var e=b.getUTCSeconds();if(e<10){e="0"+e}if(c){if(d<10){d="0"+d}return c+":"+d+":"+e}return d+":"+e}return{displayName:"MediaControlTime",mixins:[b.compMixins.skinBasedComp],propTypes:{style:a.PropTypes.object,playerId:a.PropTypes.string.isRequired,mediaAspect:c.Types.SiteAspects.mediaAspect.isRequired},statics:{useSantaTypes:true},getInitialState:function(){return{currentTime:0,duration:0}},componentDidMount:function(){this.props.mediaAspect.registerStateChange(this.props.id,this.props.playerId,this.setState.bind(this))},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.playerId)},getSkinProperties:function(){return{"":{style:this.props.style},played:{children:[d(this.state.currentTime)]},total:{children:[d(this.state.duration)]}}}}});define("mediaControls/mediaControlsContainer/mediaControlsContainer",["react","lodash","core","santaProps","utils","mediaControls/mediaControlPlay/mediaControlPlay","mediaControls/mediaControlFullscreen/mediaControlFullscreen","mediaControls/mediaControlVolume/mediaControlVolume","mediaControls/mediaControlProgress/mediaControlProgress","mediaControls/mediaControlTime/mediaControlTime"],function(a,b,c,d,e,f,g,h,i,j){"use strict";var k=e.mediaConsts;var l={play:{componentName:"wysiwyg.viewer.components.MediaControlPlay",style:{width:40,height:40}},volume:{componentName:"wysiwyg.viewer.components.MediaControlVolume",style:{width:120,height:40}},fullscreen:{componentName:"wysiwyg.viewer.components.MediaControlFullscreen",style:{width:40,height:40}},progress:{componentName:"wysiwyg.viewer.components.MediaControlProgress",style:{width:240,height:40}},time:{componentName:"wysiwyg.viewer.components.MediaControlTime",style:{width:120,height:40}}};return{displayName:"MediaControls",mixins:[c.compMixins.skinBasedComp],propTypes:b.defaults({id:d.Types.Component.id.isRequired,mediaAspect:d.Types.SiteAspects.mediaAspect.isRequired,iconsDescriptor:d.Types.MediaControls.iconsDescriptor,compProp:d.Types.Component.compProp,componentViewMode:d.Types.RenderFlags.componentViewMode.isRequired,enableFullsceen:a.PropTypes.bool,playerInTimedHoverState:a.PropTypes.bool,playerInHoverState:a.PropTypes.bool},d.santaTypesUtils.getSantaTypesByDefinition(f),d.santaTypesUtils.getSantaTypesByDefinition(g),d.santaTypesUtils.getSantaTypesByDefinition(h),d.santaTypesUtils.getSantaTypesByDefinition(i),d.santaTypesUtils.getSantaTypesByDefinition(j)),statics:{useSantaTypes:true},getInitialState:function(){return{playbackState:k.playbackTypes.WAITING}},getDefaultProps:function(){return{enableFullsceen:true,playerInHoverState:false}},componentDidMount:function(){if(this.props.compProp.playerId){this.props.mediaAspect.registerStateChange(this.props.id,this.props.compProp.playerId,this.setPlaybackState)}},componentWillUnmount:function(){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.compProp.playerId)},componentWillReceiveProps:function(a){if(this.props.compProp.playerId!==a.compProp.playerId){this.props.mediaAspect.unregisterStateChange(this.props.id,this.props.compProp.playerId)}if(a.compProp.playerId){this.props.mediaAspect.registerStateChange(this.props.id,this.props.compProp.playerId,this.setPlaybackState)}},setPlaybackState:function(a){if(this.state.playbackState!==a.playbackState){this.setState({playbackState:a.playbackState})}},getControl:function(a,c){var d=l[a].componentName;var e=a;var f=b.assign({ref:a,skinPart:a,id:this.props.id+a,playerId:this.props.compProp.playerId,iconsDescriptor:this.props.iconsDescriptor,style:l[a].style},c);return this.createChildComponent(null,d,e,f)},getSkinProperties:function(){var a=this.state.playbackState===k.playbackTypes.PLAYING;var b=this.state.playbackState!==k.playbackTypes.LOADING&&this.state.playbackState!==k.playbackTypes.READY;return{"":{style:this.props.style,"data-player-id":this.props.compProp.playerId,onClick:function(a){a.stopPropagation()}},controls:{className:this.classSet({"video-playing":a,"video-paused":!a,"video-controls":this.props.componentViewMode!=="preview"||b,"visible-controls":this.props.componentViewMode!=="preview"||this.props.playerInHoverState&&this.props.playerInTimedHoverState})},play:this.getControl("play"),volume:this.getControl("volume"),fullscreen:this.props.enableFullsceen?this.getControl("fullscreen"):{style:{display:"none"}},progress:this.getControl("progress",{showStoryboard:this.props.compProp.showStoryboard}),time:this.getControl("time")}}}});define("mediaControls/utils/mediaControlsDataRequiermentsChecker",["core","lodash","utils"],function(a,b,c){"use strict";var d=a.dataRequirementsChecker;var e=c.svg;function f(a,c){if(b.has(a.svgShapes,c)){return}return e.createSvgFetchRequest(a.serviceTopology.mediaRootUrl,a.svgShapes,c)}function g(a,c){var d=b.get(c,["style","style","properties"]);var e=b.filter(d,function(a){return b.startsWith(a,"svgshape")});var g=b.map(e,function(b){return f(a,b)});return b.compact(g)}d.registerCheckerForCompType("wysiwyg.viewer.components.MediaOverlayControls",g);d.registerCheckerForCompType("wysiwyg.viewer.components.MediaControls",g)});define("mediaControls",["mediaControls/mediaOverlayControls/mediaOverlayControls","mediaControls/mediaControlsContainer/mediaControlsContainer","mediaControls/mediaControlPlay/mediaControlPlay","mediaControls/mediaControlFullscreen/mediaControlFullscreen","mediaControls/mediaControlVolume/mediaControlVolume","mediaControls/mediaControlProgress/mediaControlProgress","mediaControls/mediaControlTime/mediaControlTime","mediaControls/mediaControlStoryboard/mediaControlStoryboard","mediaControls/utils/mediaControlsDataRequiermentsChecker"],function(a,b,c,d,e,f,g,h){"use strict";return{mediaOverlayControls:a,mediaControls:b,mediaControlPlay:c,mediaControlFullscreen:d,mediaControlVolume:e,mediaControlProgress:f,mediaControlTime:g,mediaControlStoryboard:h}});