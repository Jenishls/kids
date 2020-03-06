/**  
 * Handles the dom event in a simpler format
 * 
 * @author Rakesh Shrestha
*/

const domEvent = (event) => (selector) => (HOF) => {
    $(document)
        .off(event, selector)
        .on(event, selector, HOF);
}

export default domEvent;