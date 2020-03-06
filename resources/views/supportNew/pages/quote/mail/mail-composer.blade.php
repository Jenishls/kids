<style>
    .modal-dialog {
        position: static;
        max-width: 500px;
        width: auto;
        margin: 0;
        border-radius: 4px;
    }
    .modal-dialog .modal-content {
        border: 0;
        border-radius: 4px;
    }
    .modal-content {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ebedf2;
        border-radius: .3rem;
        outline: 0;
    }
    .kt-inbox .kt-inbox__form {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-shadow: 0 0 7px 0 rgba(0,0,0,.1);
        box-shadow: 0 0 7px 0 rgba(0,0,0,.1);
    }
    .kt-inbox .kt-inbox__form .kt-inbox__head {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 20px 15px 20px 25px;
        border-bottom: 1px solid #ebedf2;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__head .kt-inbox__title {
        margin-right: 10px;
        font-size: 1.2rem;
        font-weight: 500;
        color: #595d6e;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__head .kt-inbox__actions {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__head .kt-inbox__actions .kt-inbox__icon {
        margin-left: 5px;
    }
    .kt-inbox .kt-inbox__icon.kt-inbox__icon--light {
        background-color: transparent;
    }
    .kt-inbox .kt-inbox__icon.kt-inbox__icon--md {
        height: 30px;
        width: 30px;
    }
    [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
        cursor: pointer;
    }
    .kt-inbox .kt-inbox__icon {
        border: 0;
        background: 0 0;
        outline: 0!important;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: 0!important;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        height: 35px;
        width: 35px;
        background-color: #f7f8fa;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        cursor: pointer;
        margin: 0;
        border-radius: 0;
        border-radius: 4px;
    }
    .kt-inbox .kt-inbox__icon.kt-inbox__icon--md i {
        font-size: 1rem;
    }
    .kt-inbox .kt-inbox__icon i {
        color: #8e96b8;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body {
        padding: 0 0 10px 0;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        min-height: 50px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 10px 25px;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__wrapper {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
        padding: 0;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__label {
        font-weight: 400;
        font-size: 1rem;
        width: 40px;
        min-width: 40px;
        color: #74788d;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__input {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .tagify {
        border: 0!important;
    }
    .tagify {
        border-radius: 4px;
        border-color: #e2e5ec;
    }

    .tagify {
        --tags-border-color: #DDD;
        --tag-bg: #E5E5E5;
        --tag-hover: #D3E2E2;
        --tag-text-color: black;
        --tag-text-color--edit: black;
        --tag-pad: 0.3em 0.5em;
        --tag-inset-shadow-size: 1.1em;
        --tag-invalid-color: #D39494;
        --tag-invalid-bg: rgba(211, 148, 148, 0.5);
        --tag-remove-bg: rgba(211, 148, 148, 0.3);
        --tag-remove-btn-bg: none;
        --tag-remove-btn-bg--hover: #c77777;
        --tag--min-width: 1ch;
        --tag--max-width: auto;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        border: 1px solid #ddd;
        border: 1px solid var(--tags-border-color);
        padding: 0;
        line-height: 1.1;
        cursor: text;
        position: relative;
        -webkit-transition: .1s;
        transition: .1s;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .tagify .tagify__input {
        border: 0!important;
    }
    .tagify:not(.tagify--mix) .tagify__input {
        white-space: nowrap;
    }
    .tagify .tagify__input {
        color: #595d6e;
    }
    .tagify__input {
        display: block;
        min-width: 110px;
        margin: 5px;
        padding: .3em .5em;
        padding: var(--tag-pad,.3em .5em);
        line-height: inherit;
        position: relative;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__input input {
        border: 0!important;
        -webkit-box-shadow: none!important;
        box-shadow: none!important;
        -moz-appearance: none!important;
        -webkit-appearance: none!important;
    }
    .tagify+input, .tagify+textarea {
        display: none!important;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__tools {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin-left: 1rem;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__tools .kt-inbox__tool {
        font-size: 1rem;
        color: #a2a5b9;
        font-weight: 500;
        margin-left: 10px;
        cursor: pointer;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__tools .kt-inbox__tool {
        font-size: 1rem;
        color: #a2a5b9;
        font-weight: 500;
        margin-left: 10px;
        cursor: pointer;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field.kt-inbox__field--bcc, .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field.kt-inbox__field--cc {
        display: none;
        margin-top: 5px;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
        padding: 0;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__to .kt-inbox__field .kt-inbox__label {
        font-weight: 400;
        font-size: 1rem;
        width: 40px;
        min-width: 40px;
        color: #74788d;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__subject {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        min-height: 50px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 0 25px;
        border-top: 1px solid #ebedf2;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__subject .form-control {
        border: 0;
        border-radius: 0;
        padding-left: 0;
        padding-right: 0;
        font-weight: 400;
        font-size: 1rem;
        color: #74788d;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .ql-toolbar.ql-snow {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        height: 50px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        border-radius: 0;
        border: 0;
        border-top: 1px solid #ebedf2;
        border-bottom: 1px solid #ebedf2;
        padding-left: 18px;
    }
    .ql-toolbar.ql-snow {
        border: 1px solid #ccc;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
        padding: 8px;
    }
    .ql-toolbar.ql-snow .ql-formats {
        margin-right: 15px;
    }
    .ql-snow .ql-formats {
        display: inline-block;
        vertical-align: middle;
    }
    .ql-toolbar.ql-snow .ql-formats {
        margin-right: 15px;
    }
    .ql-snow .ql-formats {
        display: inline-block;
        vertical-align: middle;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .ql-toolbar.ql-snow .ql-picker-label, .kt-inbox .kt-inbox__form .kt-inbox__body .ql-toolbar.ql-snow .ql-picker-label:before {
        font-weight: 400;
        font-size: 1rem;
        color: #74788d;
        font-family: Poppins,Helvetica,sans-serif;
    }
    .ql-toolbar.ql-snow .ql-picker-label {
        border: 1px solid transparent;
    }
    .ql-snow .ql-picker-label {
        cursor: pointer;
        display: inline-block;
        height: 100%;
        padding-left: 8px;
        padding-right: 2px;
        position: relative;
        width: 100%;
    }
    .ql-snow .ql-picker:not(.ql-color-picker):not(.ql-icon-picker) svg {
        position: absolute;
        margin-top: -9px;
        right: 0;
        top: 50%;
        width: 18px;
    }
    .ql-snow .ql-stroke {
        fill: none;
        stroke: #444;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-width: 2;
    }
    .ql-toolbar.ql-snow .ql-picker-options {
        border: 1px solid transparent;
        -webkit-box-shadow: rgba(0,0,0,.2) 0 2px 8px;
        box-shadow: rgba(0,0,0,.2) 0 2px 8px;
    }
    .ql-snow .ql-picker-options {
        background-color: #fff;
        display: none;
        min-width: 100%;
        padding: 4px 8px;
        position: absolute;
        white-space: nowrap;
    }
    .ql-snow .ql-picker-options .ql-picker-item {
        cursor: pointer;
        display: block;
        padding-bottom: 5px;
        padding-top: 5px;
    }
    .ql-toolbar.ql-snow .ql-picker-item.ql-active, .ql-toolbar.ql-snow .ql-picker-item.ql-selected, .ql-toolbar.ql-snow .ql-picker-item:hover {
        color: #716aca;
    }
    .ql-toolbar.ql-snow .ql-formats {
        margin-right: 15px;
    }
    .ql-snow .ql-formats {
        display: inline-block;
        vertical-align: middle;
    }
    .ql-snow .ql-toolbar button, .ql-snow.ql-toolbar button {
        background: 0 0;
        border: none;
        cursor: pointer;
        display: inline-block;
        float: left;
        height: 24px;
        padding: 3px 5px;
        width: 28px;
    }
    .ql-snow .ql-toolbar button svg, .ql-snow.ql-toolbar button svg {
        float: left;
        height: 100%;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .ql-container.ql-snow {
        border: 0;
        padding: 0;
        border-radius: 0;
    }
    .ql-snow {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .ql-container {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        font-family: Helvetica,Arial,sans-serif;
        font-size: 13px;
        height: 100%;
        margin: 0;
        position: relative;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .ql-container.ql-snow .ql-editor {
        font-weight: 400;
        font-size: 1rem;
        color: #74788d;
        padding: 15px 25px;
        font-family: Poppins,Helvetica,sans-serif;
    }
    .ql-editor {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        line-height: 1.42;
        height: 100%;
        outline: 0;
        overflow-y: auto;
        padding: 12px 15px;
        -o-tab-size: 4;
        tab-size: 4;
        -moz-tab-size: 4;
        text-align: left;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    .ql-editor>* {
        cursor: text;
    }
    .ql-clipboard {
        left: -100000px;
        height: 1px;
        overflow-y: hidden;
        position: absolute;
        top: 50%;
    }
    .ql-snow .ql-tooltip {
        border: 0;
        padding: .5rem 1rem;
        -webkit-box-shadow: 0 0 50px 0 rgba(82,63,105,.15);
        box-shadow: 0 0 50px 0 rgba(82,63,105,.15);
        border-radius: 4px;
    }
    .ql-snow .ql-tooltip {
        background-color: #fff;
        border: 1px solid #ccc;
        -webkit-box-shadow: 0 0 5px #ddd;
        box-shadow: 0 0 5px #ddd;
        color: #444;
        padding: 5px 12px;
        white-space: nowrap;
    }
    .ql-snow .ql-tooltip {
        position: absolute;
        -webkit-transform: translateY(10px);
        transform: translateY(10px);
    }
    .ql-snow .ql-hidden {
        display: none;
    }
    .ql-snow .ql-tooltip a.ql-preview {
        display: inline-block;
        max-width: 200px;
        overflow-x: hidden;
        text-overflow: ellipsis;
        vertical-align: top;
    }
    .ql-snow .ql-tooltip .ql-preview {
        color: #74788d;
    }
    .ql-snow .ql-tooltip a {
        line-height: 26px;
    }
    .ql-snow .ql-tooltip a {
        cursor: pointer;
        text-decoration: none;
    }
    .ql-snow .ql-tooltip input[type=text] {
        border: 0;
        background: 0 0;
        outline: 0!important;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 1px solid #ebedf2;
        color: #595d6e;
        outline: 0!important;
        border-radius: 4px;
    }

    .ql-snow .ql-tooltip input[type=text] {
        display: none;
        border: 1px solid #ccc;
        font-size: 13px;
        height: 26px;
        margin: 0;
        padding: 3px 5px;
        width: 170px;
    }
    .ql-snow .ql-tooltip .ql-action {
        -webkit-transition: color .3s ease;
        transition: color .3s ease;
        color: #74788d;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__body .kt-inbox__attachments {
        min-width: 500px;
        display: inline-block;
        padding: 0 25px;
    }
    .dropzone.dropzone-multi {
        border: 0;
        padding: 0;
    }
    .dropzone {
        min-height: auto;
    }
    .dropzone {
        border: 2px solid rgba(0,0,0,.3);
    }
    .kt-inbox .kt-inbox__form .kt-inbox__foot {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
        padding: 20px 15px 20px 25px;
        border-top: 1px solid #ebedf2;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__foot .kt-inbox__primary {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .btn-group, .btn-group-vertical {
        position: relative;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        vertical-align: middle;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__foot .kt-inbox__primary .btn-group .btn:nth-child(1) {
        padding-left: 20px;
        padding-right: 20px;
    }
    .btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .btn.btn-bold {
        font-weight: 600;
    }
    .btn-group-vertical>.btn, .btn-group>.btn {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__foot .kt-inbox__primary .btn-group .btn:nth-child(2) {
        padding-left: 6px;
        padding-right: 9px;
    }
    .btn-brand+.btn.dropdown-toggle {
        position: relative;
    }
    .btn-group>.btn-group:not(:first-child)>.btn, .btn-group>.btn:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .btn-group>.btn-group:not(:first-child), .btn-group>.btn:not(:first-child) {
        margin-left: -1px;
    }
    .dropdown-menu.dropdown-menu-fit {
        padding: 0;
    }
    .dropdown-menu {
        border: 0!important;
        margin: 0;
        border-radius: 0;
        min-width: 14rem;
        padding: 0;
        -webkit-box-shadow: 0 0 50px 0 rgba(82,63,105,.15);
        box-shadow: 0 0 50px 0 rgba(82,63,105,.15);
        padding: 1rem 0;
        border-radius: 4px;
        left: 0;
    }
    .dropdown-menu-right {
        right: 0;
        left: auto;
    }
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 95;
        display: none;
        float: left;
        min-width: 10rem;
        padding: .5rem 0;
        margin: .125rem 0 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.15);
        border-radius: .25rem;
    }
    .kt-nav {
        display: block;
        padding: 1rem 0;
        margin: 0;
        list-style: none;
        border: 0;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__foot .kt-inbox__primary .kt-inbox__panel {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin-left: 1rem;
    }
    .kt-inbox .kt-inbox__form .kt-inbox__foot .kt-inbox__secondary {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin: 0;
    }
</style>
<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content kt-inbox">
        <div class="kt-inbox__form" id="kt_inbox_compose_form">
            <div class="kt-inbox__head">
                <div class="kt-inbox__title">Compose</div>
                <div class="kt-inbox__actions">
                    <button type="button" class="kt-inbox__icon kt-inbox__icon--md kt-inbox__icon--light">
                        <i class="flaticon2-arrow-1"></i>
                    </button>
                    <button type="button" class="kt-inbox__icon kt-inbox__icon--md kt-inbox__icon--light" data-dismiss="modal">
                        <i class="flaticon2-cross"></i>
                    </button>
                </div>
            </div>
            <div class="kt-inbox__body">
                <div class="kt-inbox__to">
                    <div class="kt-inbox__wrapper">
                        <div class="kt-inbox__field kt-inbox__field--to">
                            <div class="kt-inbox__label">
                                To:
                            </div>
                            <div class="kt-inbox__input">
                                <tags class="tagify  " aria-haspopup="true" aria-expanded="false" role="tagslist">
                                    <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-multiline="false"></span>
                                </tags><input type="text" name="compose_to" value="Chris Muller, Lina Nilson">
                            </div>
                            <div class="kt-inbox__tools">
                                <span class="kt-inbox__tool kt-inbox__tool--cc">Cc</span>
                                <span class="kt-inbox__tool kt-inbox__tool--bcc">Bcc</span>
                            </div>
                        </div>
                        <div class="kt-inbox__field kt-inbox__field--cc">
                            <div class="kt-inbox__label">
                                Cc:
                            </div>
                            <div class="kt-inbox__input">
                                <tags class="tagify  " aria-haspopup="true" aria-expanded="false" role="tagslist">
                                    <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-multiline="false"></span>
                                </tags><input type="text" name="compose_cc">
                            </div>
                            <div class="kt-inbox__tools">
                                <button type="button" class="kt-inbox__icon kt-inbox__icon--delete kt-inbox__icon--sm kt-inbox__icon--light">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                        <div class="kt-inbox__field kt-inbox__field--bcc">
                            <div class="kt-inbox__label">
                                Bcc:
                            </div>
                            <div class="kt-inbox__input">
                                <tags class="tagify  " aria-haspopup="true" aria-expanded="false" role="tagslist">
                                    <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-multiline="false"></span>
                                </tags><input type="text" name="compose_bcc">
                            </div>
                            <div class="kt-inbox__tools">
                                <button type="button" class="kt-inbox__icon kt-inbox__icon--delete kt-inbox__icon--sm kt-inbox__icon--light">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-inbox__subject">
                    <input class="form-control" name="compose_subject" placeholder="Subject">
                </div>

                <div class="ql-toolbar ql-snow">
                    <span class="ql-formats">
                        <span class="ql-header ql-picker">
                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-1">
                                <svg viewBox="0 0 18 18"> 
                                    <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon> 
                                    <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon> 
                                </svg>
                            </span>
                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-1">
                                <span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span>
                                <span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span>
                                <span tabindex="0" role="button" class="ql-picker-item" data-value="3"></span>
                                <span tabindex="0" role="button" class="ql-picker-item ql-selected"></span>
                            </span>
                        </span>
                        <select class="ql-header" style="display: none;">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option selected="selected"></option>
                        </select>
                    </span>
                    <span class="ql-formats">
                        <button type="button" class="ql-bold">
                            <svg viewBox="0 0 18 18"> 
                                <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> 
                                <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> 
                            </svg>
                        </button>
                        <button type="button" class="ql-italic">
                            <svg viewBox="0 0 18 18"> 
                                <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> 
                                <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> 
                                <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> 
                            </svg>
                        </button>
                        <button type="button" class="ql-underline">
                            <svg viewBox="0 0 18 18"> 
                                <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                             </svg>
                            </button>
                            <button type="button" class="ql-link">
                                <svg viewBox="0 0 18 18"> 
                                    <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line>
                                    <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> 
                                    <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> 
                                </svg>
                            </button>
                        </span>
                        <span class="ql-formats">
                            <button type="button" class="ql-list" value="ordered">
                                <svg viewBox="0 0 18 18"> 
                                    <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> 
                                    <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> 
                                    <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> 
                                    <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> 
                                    <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> 
                                    <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> 
                                    <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> 
                                </svg>
                            </button>
                            <button type="button" class="ql-list" value="bullet">
                                <svg viewBox="0 0 18 18"> 
                                    <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> 
                                    <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> 
                                    <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> 
                                    <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> 
                                    <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> 
                                    <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> 
                                </svg>
                            </button>
                        </span>
                        <span class="ql-formats">
                            <button type="button" class="ql-clean">
                                <svg class="" viewBox="0 0 18 18"> 
                                    <line class="ql-stroke" x1="5" x2="13" y1="3" y2="3"></line> 
                                    <line class="ql-stroke" x1="6" x2="9.35" y1="12" y2="3"></line> 
                                    <line class="ql-stroke" x1="11" x2="15" y1="11" y2="15"></line> 
                                    <line class="ql-stroke" x1="15" x2="11" y1="11" y2="15"></line> 
                                    <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="7" x="2" y="14"></rect> 
                                </svg>
                            </button>
                        </span>
                    </div>
                    <div class="kt-inbox__editor ql-container ql-snow" id="kt_inbox_compose_editor" style="height: 300px">
                        <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="Type message...">
                            <p>
                                <br>
                            </p>
                        </div>
                        <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                        <div class="ql-tooltip ql-hidden">
                            <a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>
                            <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">
                            <a class="ql-action"></a>
                            <a class="ql-remove"></a>
                        </div>
                    </div>

                <div class="kt-inbox__attachments">
                    <div class="dropzone dropzone-multi" id="kt_inbox_compose_attachments">
                        <div class="dropzone-items">
                            
                        </div>
                    <div class="dz-default dz-message"><span>Drop files here to upload</span></div></div>
                </div>
            </div>
            <div class="kt-inbox__foot">
                <div class="kt-inbox__primary">
                    <div class="btn-group">
                        <button type="button" class="btn btn-brand btn-bold">
                            Send
                        </button>

                        <button type="button" class="btn btn-brand btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        </button>

                        <div class="dropdown-menu dropup dropdown-menu-fit dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-writing"></i>
                                        <span class="kt-nav__link-text">Schedule Send</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-medical-records"></i>
                                        <span class="kt-nav__link-text">Save &amp; archive</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-hourglass-1"></i>
                                        <span class="kt-nav__link-text">Cancel</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="kt-inbox__panel">
                        <label class="kt-inbox__icon kt-inbox__icon--light dz-clickable" id="kt_inbox_compose_attachments_select">
                            <i class="flaticon2-clip-symbol"></i>
                        </label>
                        <label class="kt-inbox__icon kt-inbox__icon--light">
                            <i class="flaticon2-pin"></i>
                        </label>
                    </div>
                </div>

                <div class="kt-inbox__secondary">
                    <button class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" title="" data-original-title="More actions">
                        <i class="flaticon2-settings"></i>
                    </button>
                    <button class="kt-inbox__icon kt-inbox__icon--remove kt-inbox__icon--light" data-toggle="kt-tooltip" title="" data-original-title="Dismiss reply">
                        <i class="flaticon2-rubbish-bin-delete-button"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>