define("popupCloseTextButton",["lodash","santaProps","siteButton"],function(a,b,c){"use strict";var d=a.cloneDeep(c);d.displayName="PopupCloseTextButton";d.propTypes=a.defaults({closePopupPage:b.Types.popupPage.close},c.propTypes);d.getSkinProperties=function(){var a=c.getSkinProperties.apply(this,arguments);a[""].onClick=this.props.closePopupPage;return a};return d});