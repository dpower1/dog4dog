define("svgShape/util/svgShapeDataRequirementsChecker",["core","lodash","utils"],function(a,b,c){"use strict";var d=a.dataRequirementsChecker;var e=c.svg;var f="<svg><g></g></svg>";var g="svgShapes";function h(a,c,d){return b(d).without("skins.viewer.svgshape.SvgShapeDefaultSkin").difference(b.keys(c)).map(b.partial(e.createSvgFetchRequest,a,c,b)).value()}function i(a,b){return h(a.serviceTopology.mediaRootUrl,a[g],b.skins)}d.registerCheckerForCompType("wysiwyg.viewer.components.svgshape.SvgShape",i);d.registerCheckerForCompType("wysiwyg.viewer.components.PopupCloseIconButton",i);return{requirementChecker:h,DEFAULT_SHAPE:f,SVG_ROOT:g}});define("svgShape/components/svgShape",["lodash","core","skins","svgCommon","utils","santaProps","svgShape/util/svgShapeDataRequirementsChecker"],function(a,b,c,d,e,f){"use strict";var g=c.skinsRenderer,h="skins.viewer.svgshape.SvgShapeDefaultSkin",i='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 376.654 376.654"><g><polygon points="298.185,264.061 149.092,352.082 0,264.061 0,88.021 149.092,0 298.185,88.021 "/></g></svg>';var j=function(a,b){if(b===h){return i}if(a){return a}return null};function k(b,c){var d="";a.forOwn(c,function(a,b){d+=" "+b+'="'+a+'"'});return"<a"+d+">"+b+"</a>"}return{displayName:"SvgShape",mixins:[b.compMixins.baseCompMixin],statics:{useSantaTypes:true},propTypes:{id:f.Types.Component.id,structure:f.Types.Component.structure,skin:f.Types.Component.skin,compData:f.Types.Component.compData.isRequired,theme:f.Types.Component.theme,rootNavigationInfo:f.Types.Component.rootNavigationInfo,THEME_DATA:f.Types.Theme.THEME_DATA,svgString:f.Types.SvgShape.string,styleId:f.Types.Component.styleId,linkRenderInfo:f.Types.Link.linkRenderInfo,serviceTopology:f.Types.ServiceTopology.serviceTopology},getSkinProperties:function(){var a=this.props.skin;var b={"":{}};var f=j(this.props.svgString,a,this.props.id,this.props.structure.layout);if(f){var i=this.props.theme;var l="";var m=c.skins[h];var n={};var o=this.props.compData;var p=m.paramsDefaults.fillcolor;var q=p;if(o&&o.link){var r=e.linkRenderer.renderLink(o.link,this.props.linkRenderInfo,this.props.rootNavigationInfo);f=k(f,r)}if(i){n={css:m.css,params:m.params,paramsDefaults:m.paramsDefaults};l='<style type="text/css">'+g.createSkinCss(n,i.style.properties,this.props.THEME_DATA,this.props.styleId,null,this.props.serviceTopology)+"</style>";q=i.style.properties.fillcolor||q}f=d.transformToTintColors(f,e.colorParser.getColorValue(this.props.THEME_DATA,q));b[""]={dangerouslySetInnerHTML:{__html:l+f||""}}}this.updateRootRefDataStyles(b[""]);return b},render:function(){var a=this.getSkinProperties();return g.renderSkinHTML(null,a,this.props.styleId,this.props.id,this.props.structure,this.props,this.state)}}});define("svgShape/components/popupCloseIconButton",["lodash","svgShape/components/svgShape","santaProps"],function(a,b,c){"use strict";var d=a.cloneDeep(b);function e(){this.props.closePopupPage()}d.propTypes=a.defaults({closePopupPage:c.Types.popupPage.close},b.propTypes);d.displayName="PopupCloseIconButton";d.getSkinProperties=function a(){var c=b.getSkinProperties.apply(this,arguments);c[""].onClick=e.bind(this);c[""].style.cursor="pointer";return c};return d});define("svgShape",["svgShape/components/popupCloseIconButton","svgShape/components/svgShape"],function(a,b){"use strict";return{popupCloseIconButton:a,svgShape:b}});