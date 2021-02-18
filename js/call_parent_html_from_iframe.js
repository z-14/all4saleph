function getParentFunction(funcName) {
  var func = null;
  // Child opened in new window e.g. target="blank"
  if (top.window.opener && !top.window.opener.closed) {
    try { func = eval("top.window.opener."+funcName); } catch (error) {}
  }
  if (!(func)) {
    // Child opened in IFRAME
    try { func = eval("top."+funcName); } catch (error) { }
  }
  if (!(func)) {
    throw new Error("function \""+funcName+"\" is not in parent window.");
  }
  return func; 
}

/*
sample call
function callParent(){
var foo = getParentFunction("parentFunction") ;
foo("Hello from iframe") ;
}
*/
