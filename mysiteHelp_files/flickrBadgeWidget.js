define("flickrBadgeWidget",["core","utils","santaProps"],function(a,b,c){"use strict";var d=a.compMixins,e=b.urlUtils;return{displayName:"FlickrBadgeWidget",mixins:[d.skinBasedComp],propTypes:{style:c.Types.Component.style.isRequired,id:c.Types.Component.id.isRequired,compData:c.Types.Component.compData.isRequired,santaBase:c.Types.santaBase.isRequired,origin:c.Types.Location.origin},statics:{useSantaTypes:true},getInitialState:function(){return{width:this.props.style.width,height:this.props.style.height}},componentDidMount:function(){window.addEventListener("message",this.processMessage)},componentWillUnmount:function(){window.removeEventListener("message",this.processMessage)},processMessage:function(a){if(a.data&&a.data.compId===this.props.id){this.registerReLayout();this.setState(a.data.size)}},getFlickSrc:function(){var a=this.props.compData;var b={imageCount:a.imageCount,whichImages:a.whichImages,imageSize:a.imageSize,layoutOrientation:a.layoutOrientation,userId:a.userId,tag:a.tag,origin:this.props.origin,compId:this.props.id};return this.props.santaBase+"/static/external/flickrBadgeWidget.html?"+e.toQueryString(b)},getSkinProperties:function(){return{"":{style:{width:this.state.width,height:this.state.height}},iframe:{"data-src":this.getFlickSrc(),height:this.state.height,width:this.state.width},overlayClick:{href:"http://www.flickr.com/photos/"+this.props.compData.userId+"/",target:"_blank"}}}}});