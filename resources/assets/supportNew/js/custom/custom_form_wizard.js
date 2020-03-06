   $.fn.WizardForm = function() {
       let build = ['startWizard', 'setButtons', 'attachHandlers'];
       this.events = {};
       this.validNextEvents = ["nextBtn"];
       this.validTabEvents = ["tabEvent"];
       this.unValidTabEvents = ["beforeNext"];
       this.formChangedEvents = ["formChange"];
       this.startWizard = function() {
           this.plugin = this;
           this.tabs = this.plugin.find('.wizard-tabs');
           this.totalSteps = this.plugin.find('.wizard-tabs').length;
       }
       this.setButtons = function() {
           this.next = this.plugin.find('[data-wizard-step="next"]');
           this.prev = this.plugin.find('[data-wizard-step="prev"]');
           this.save = this.plugin.find('[data-wizard-step="save"]');
           this.changeBtn();
       }
       this.attachHandlers = function() {
           this.next.on('click', this.goNext.bind(this));
           this.prev.on('click', this.goPrev.bind(this));
           this.tabs.on('click', this.goToTab.bind(this));
       }
       this.currentStep = function() {
           return this.plugin.find('.wizard-tabs.active');
       }
       this.nextStep = function() {
           return $(this.currentStep()).next().first();
       }
       this.prevStep = function() {
           return $(this.currentStep()).prev().first();
       }
       this.on = (event, handler) => {
           this.events[event] = handler;
       }
       this.goToTab = function(e) {
           this.activeAction = 'tab';
           e.preventDefault();
           this.targetTab = $(e.currentTarget);
           if (this.currentStep().data('validateurl') && (this.currentStep().data('validateurl') !== 'muted')) {
               this.validNextEvents.forEach(function(event, i) {
                if(typeof this.events[event] === 'function') {
                   this.events[event](this);
                }
               }.bind(this));
           }else if (this.currentStep().data('validateurl') == 'muted') {
               this.validTabEvents.forEach(function(event, i) {
                if(typeof this.events[event] === 'function') {
                   this.events[event](this);
                }
               }.bind(this));
           } else {
               this.targetTab.addClass('active');
               this.targetTab.siblings().removeClass('active');
               let target = this.targetTab.attr('data-target')
               $(target).siblings().hide();
               $(target).show();
               this.changeBtn();
           }
       }
       this.goNext = function(e) {
           e.preventDefault();
           this.activeAction = 'next';
           if (this.currentStep().data('validateurl')) {
               this.validNextEvents.forEach(function(event, i) {
                if(typeof this.events[event] === 'function') {
                    this.events[event](this);
                }
               }.bind(this));
           } else {
               this.unValidTabEvents.forEach(function(event, i) {
                if(typeof this.events[event] === 'function') {
                   this.events[event](this);
                }
               }.bind(this));
               this.showNext();
           }
           //:todo Accept only change events
       }
       this.showNext = function() {
           const nextStep = this.nextStep();
           nextStep.addClass('active');
           nextStep.siblings().removeClass('active');
           let target = nextStep.attr('data-target')
           $(target).siblings().hide();
           $(target).show();
           this.changeBtn();
       }
       this.goPrev = function(e) {
           e.preventDefault();
           this.activeAction = 'prev';
        //    if (this.currentStep().data('validateurl')) {
        //        this.validNextEvents.forEach(function(event, i) {
        //            this.events[event](this);
        //        }.bind(this));
        //    }else{
               this.showPrev();
        //    }
       }

       this.showPrev = function() {
           const prevStep = this.prevStep();
           prevStep.addClass('active');
           prevStep.siblings().removeClass('active');
           let target = prevStep.attr('data-target')
           $(target).siblings().hide();
           $(target).show();
           this.changeBtn();
       }

       this.changeBtn = function() {
            this.formChangedEvents.forEach(function(event, i) {
                if(typeof this.events[event] === 'function') {
                this.events[event](this);
                }
           }.bind(this));
           this.plugin.find('.wizard--btn').removeClass('active');
        //    $('.wizard--btn').removeClass('active');
           if (this.currentStep().is(':first-child')) {
               $(this.next).addClass('active');
           } else if (this.currentStep().is(':last-child')) {
               $(this.save).addClass('active');
               $(this.prev).addClass('active');
           } else {
               $(this.prev).addClass('active');
               $(this.next).addClass('active');
           }
           
       }

       this.sendAjax = function(url) {
           let SELF = this;
           let data = $(`${$(this.currentStep()).attr('data-target')} :input`).serializeArray();
           supportAjax({
               url,
               data,
               method: 'post'
           }, function(resp) {
               $($(SELF.currentStep()).attr('data-target') + ' input').css({ 'border-color': '#e2e5ec' }).siblings(".errorMessage").empty();
               if (SELF.targetTab) {
                   SELF.targetTab.addClass('active');
                   SELF.targetTab.siblings().removeClass('active');
                   let target = SELF.targetTab.attr('data-target')
                   $(target).siblings().hide();
                   $(target).show();
                   SELF.changeBtn();
                   SELF.targetTab = null;
               } else {
                   SELF.showNext();
               }
           }, function(err) {
               try {
                   if (typeof err.responseJSON.errors !== 'undefined')
                       SELF.displayError(err.responseJSON.errors);
               } catch (e) {
                   if (err.status === 500)
                       toastr.error(
                           `<strong>${err.responseText}!</strong>`
                       );
               }
           })
       }

       this.displayError = function(errors) {
           let targetForm = $(this.currentStep()).attr('data-target');
           $(targetForm).find('.errorMessage').empty();
           for (let [key, value] of Object.entries(errors)) {
               $(targetForm).find(`[name="${key}"]:not(:disabled)`).css({ 'border-color': 'red' }).siblings(".errorMessage").html(value[0]);
           }
       }

       this.init = function() {
           $(build).each((i, x) => {
               this[x]();
           });
           return this;
       };
       return this.init();
   }