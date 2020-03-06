import domEvent from './helpers/dom-event.js';

/** Events Listeners */
let clickEvent = domEvent('click');
let keyupEvent = domEvent('keyup');
let keydownEvent = domEvent('keydown');
let keypressEvent = domEvent('keypress');
let blurEvent = domEvent('blur');
let changeEvent = domEvent('change');
let submitEvent = domEvent('submit');

Object.assign(window, {
    clickEvent,
    keyupEvent,
    keydownEvent,
    keypressEvent,
    blurEvent,
    changeEvent,
    submitEvent
})