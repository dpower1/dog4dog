define("tinyMenu/components/tinyMenuItem",["lodash","react","reactDOM","utils"],function(a,b,c,d){"use strict";var e=d.cssUtils;function f(){return a.get(this,["link","pageId","id"])}function g(b){b=b||this.props;var c=b.options.currentPage;var d=a.some(b.menuItem.items,function(a){var b=f.call(a);return b===c});return{isSubMenuOpen:d}}function h(c,d){function e(a){return a.isCurrentPage}function g(a){return a.isCurrentAnchor}var h=a.chain(c).filter("isVisibleMobile").map(function(b){var c=a.get(b,["link","type"]);var e={item:b};e.isCurrentPage=c==="PageLink"&&f.call(b)===d.currentPage;e.isCurrentAnchor=d.currentAnchor&&(c==="AnchorLink"&&a.get(b,["link","anchorDataId","id"])===d.currentAnchor);return e}).reduce(function(b,c){if(d.currentAnchor){if(c.isCurrentAnchor){var f=a.find(b,e);if(f){f.isCurrentPage=false}}else if(c.isCurrentPage){if(a.find(b,g)){c.isCurrentPage=false}}}b.push(c);return b},[]).map(function(a){return b.createElement(i,{menuItem:a.item,current:a.isCurrentPage||a.isCurrentAnchor,options:d,key:"item"+a.item.id})}).value();if(d.useSeparators){var j=[];for(var k=0;k<h.length;++k){j.push(h[k]);if(k<h.length-1){j.push(b.DOM.div({className:d.styleId+"_separator",key:"separator_"+k}))}}h=j}return h}var i=b.createClass({displayName:"TinyMenuItem",propTypes:{menuItem:b.PropTypes.object,options:b.PropTypes.object,current:b.PropTypes.bool},statics:{buildChildren:h},getInitialState:g,onSubMenuToggle:function(a){this.onSubMenuClick(a);a.stopPropagation()},onSubMenuClick:function(b){var d=!this.state.isSubMenuOpen;this.setState({isSubMenuOpen:d},function(){if(d){var b=c.findDOMNode(this);if(a.isFunction(b.scrollIntoView)){b.scrollIntoView()}}});if(!this.props.menuItem.link){b.stopPropagation()}},componentWillReceiveProps:function(a){if(this.props.options.timestamp!==a.options.timestamp){this.setState(g(a))}},render:function(){var c=this.props.menuItem,d=a.some(c.items,"isVisibleMobile"),f=d?this.onSubMenuClick:this.props.options.clickCallback,g=c.id,i=this.props.options;function j(a){return e.concatenateStyleIdToClassName(i.styleId,a)}var k=b.DOM.a(a.merge({children:c.label,className:e.concatenateStyleIdToClassList(i.styleId,["link",this.props.current&&"current"]),onClick:f,key:"link"+g},a.get(c,["link","render"])));if(!d){return b.DOM.li({className:j("item")},k)}var l=b.DOM.span({className:e.concatenateStyleIdToClassList(i.styleId,["toggler",this.props.current&&"current"]),key:"toggler"+g,onClick:this.onSubMenuToggle});var m=b.DOM.ul({ref:"subMenuContainer",className:j("submenu")},h(c.items,a.defaults({useSeparators:false},i)));var n=[k,l];return b.DOM.li({key:"item"+this.props.menuItem.id,children:(i.useSeparators?[b.DOM.div({className:j("header"),key:"header"+g},n)]:n).concat([m]),className:e.concatenateStyleIdToClassList(i.styleId,["item","has-children",this.state.isSubMenuOpen&&"open"])})}});return i});define("tinyMenu",["react","lodash","core","tinyMenu/components/tinyMenuItem","reactDOM","santaProps"],function(a,b,c,d,e,f){"use strict";return{displayName:"TinyMenu",mixins:[c.compMixins.skinBasedComp],propTypes:{linkRenderInfo:f.Types.Link.linkRenderInfo,rootNavigationInfo:f.Types.Component.rootNavigationInfo,id:f.Types.Component.id,key:f.Types.Component.key,style:f.Types.Component.style,styleId:f.Types.Component.styleId,skin:f.Types.Component.skin,currentUrlPageId:f.Types.Component.currentUrlPageId,siteWidth:f.Types.siteWidth,browserFlags:f.Types.Browser.browserFlags,anchorChangeEvent:f.Types.SiteAspects.anchorChangeEvent,windowResizeEvent:f.Types.SiteAspects.windowResizeEvent,siteScrollingBlocker:f.Types.SiteAspects.siteScrollingBlocker,isTinyMenuOpenAllowed:f.Types.RenderFlags.isTinyMenuOpenAllowed,siteMenuWithRender:f.Types.Menu.siteMenuWithRender},statics:{useSantaTypes:true},isForcedOpen:function(){return b.isFunction(this.getComponentPreviewState)&&this.getComponentPreviewState()==="open"},getMenuState:function(){return this.isForcedOpen()?"menuOpen":this.state.menuState},isMenuOpen:function(){return this.getMenuState()==="menuOpen"},getInitialState:function(){return{menuState:"menuInitial",timestamp:new Date}},onOrientationChange:function(){this.registerReLayout();this.closeMenu()},onAnchorChange:function(a){if(a!==this.state.currentAnchor){this.setState({currentAnchor:a})}},onMouseClick:function(){if(this.isMenuOpen()){this.closeMenu()}else{this.showMenu()}},onMenuButtonClick:function(a){this.onMouseClick();a.stopPropagation();a.preventDefault()},onMenuStateChange:function(){this.registerReLayout();this.forceUpdate()},closeMenu:function(){this.timestamp=new Date;if(!this.isMenuOpen()){return}this.setState({menuState:"menuClosed"},function(){this.onMenuStateChange()}.bind(this))},showMenu:function(){if(!this.isEmpty){this.setState({menuState:"menuOpen"},this.onMenuStateChange)}},updateProps:function(a){this.items=a.siteMenuWithRender;this.isEmpty=b.every(this.items,{isVisibleMobile:false});if(this.isClassicSkin()){var c=b.get(this.props,["compProp","metaData","schemaVersion"]);this.preserveLegacySize=!c||c==="1.0"}this.siteWidth=a.siteWidth;this.forceMenuItemsScroll=a.browserFlags.forceOverflowScroll;this.animateSVG=a.browserFlags.animateTinyMenuIcon},componentWillMount:function(){this.props.windowResizeEvent.registerToOrientationChange(this);this.props.anchorChangeEvent.registerToAnchorChange(this);this.updateProps(this.props)},componentWillUpdate:function(){this.currentAnchor=b.get(this.props.anchorChangeEvent.getActiveAnchor(),["activeAnchorComp","id"])},isFixed:function(){return this.props.style.position==="fixed"},isClassicSkin:function(){return this.props.skin==="wysiwyg.viewer.skins.mobile.TinyMenuSkin"},componentWillReceiveProps:function(a){if(this.props.currentUrlPageId!==a.currentUrlPageId||this.isMenuOpen()&&!a.isTinyMenuOpenAllowed){this.closeMenu()}this.updateProps(a)},componentDidUpdate:function(){var a=this.isMenuOpen();if(a){e.findDOMNode(this.refs.menuContainer).scrollTop=0}if(!this.isClassicSkin()||this.isFixed()){this.props.siteScrollingBlocker.setSiteScrollingBlocked(this,this.isMenuOpen())}},componentDidMount:function(){this.props.siteScrollingBlocker.registerScrollingLayer(this.refs.menuContainer)},getRootStyle:function(){return this.getRootPosition?{position:this.getRootPosition(this.props.style)}:{}},getDirection:function(){var a=b.get(this,["props","compProp","direction"],"left");return this.getStyleProperty("textAlignment",a)},getSkinProperties:function(){var c=this.isMenuOpen();var e=this.props.styleId;var f=this.isClassicSkin();var g=this.isFixed();var h={};var i={styleId:e,currentPage:this.props.currentUrlPageId,clickCallback:this.onMouseClick,currentAnchor:this.currentAnchor,timestamp:this.timestamp,useSeparators:!f};var j=d.buildChildren(this.items,i);var k="dir-"+this.getDirection();if(f){h["preserve-legacy-size"]=this.preserveLegacySize;if(g){this.props.style.zIndex=c?1e3:1}}h[this.getMenuState()]=true;h[k]=true;return{"":{id:this.props.id,key:this.props.key+"_"+this.props.skin,ref:this.props.id,style:this.getRootStyle()},fullScreenOverlay:{ref:this.props.id+"fullScreenOverlay",className:"fullScreenOverlay "+this.classSet(h),style:{top:0},onClick:this.closeMenu},fullScreenOverlayContent:{className:"fullScreenOverlayContent",style:{width:this.siteWidth,top:0}},menuBackground:{className:this.classSet(h)},menuButton:{ref:this.props.id+"menuButton",onClick:this.onMenuButtonClick,className:this.classSet(b.assign({"preserve-legacy-size":this.preserveLegacySize,"force-open":this.isForcedOpen(),"no-animation":!this.animateSVG},h))},iconSVG:{preserveAspectRatio:c?"":"none"},menuContainer:{children:a.DOM.ul({children:j,className:this.classSet({"top-menu":true,open:c,"force-scroll":this.forceMenuItemsScroll}),ref:"menuItems",id:this.props.id+"menuItems"}),className:this.classSet(h)}}}}});