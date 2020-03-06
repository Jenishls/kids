const mask = mask => selector => {
    Inputmask(mask).mask(selector);
}

const phoneMask = mask({mask : "(999) 999-9999"});
const cardMask = mask({mask : "9999 9999 9999 9999"});
const zipMask = mask({mask : "99999"})
const cvvMask = mask({mask : "999"})

Object.assign(window, {
    phoneMask,
    cardMask,
    zipMask,
    cvvMask
})