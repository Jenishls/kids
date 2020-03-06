<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">	
            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="flaticon-map-location"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Basic Calendar
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="#" class="btn btn-brand btn-elevate">
                            <i class="la la-plus"></i>
                            Add Event
                        </a>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_calendar" class="fc fc-ltr fc-unthemed" style="">
                    </div>
                </div>
            </div>	
            <!--end::Portlet-->
        </div>
    </div>
</div>

<script>
    var todayDate = moment().startOf('day');
    var YM = todayDate.format('YYYY-MM');
    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
    var TODAY = todayDate.format('YYYY-MM-DD');
    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

    $('#kt_calendar').fullCalendar({
        isRTL: KTUtil.isRTL(),
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaDay,listWeek'
        },
        defaultView: 'listWeek',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        navLinks: true,
        height: 900,
        events: [
            {
                title: 'All Day Event',
                start: YM + '-01',
                description: 'Lorem ipsum dolor sit incid idunt ut',
                className: "fc-event-success"
            },
            {
                title: 'Reporting',
                start: YM + '-14T13:30:00',
                description: 'Lorem ipsum dolor incid idunt ut labore',
                end: YM + '-14',
                className: "fc-event-accent"
            },
            {
                title: 'Company Trip',
                start: YM + '-02',
                description: 'Lorem ipsum dolor sit tempor incid',
                end: YM + '-03',
                className: "fc-event-primary"
            },
            {
                title: 'Expo',
                start: YM + '-03',
                description: 'Lorem ipsum dolor sit tempor inci',
                end: YM + '-05',
                className: "fc-event-primary" 
            },
            {
                title: 'Dinner',
                start: YM + '-12',
                description: 'Lorem ipsum dolor sit amet, conse ctetur',
                end: YM + '-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: YM + '-09T16:00:00',
                description: 'Lorem ipsum dolor sit ncididunt ut labore',
                className: "fc-event-danger"
            },
            {
                id: 1000,
                title: 'Repeating Event',
                description: 'Lorem ipsum dolor sit amet, labore',
                start: YM + '-16T16:00:00'
            },
            {
                title: 'Conference',
                start: YESTERDAY,
                end: TOMORROW,
                description: 'Lorem ipsum dolor eius mod tempor labore',
                className: "fc-event-accent"
            },
            {
                title: 'Meeting',
                start: TODAY + 'T10:30:00',
                end: TODAY + 'T12:30:00',
                description: 'Lorem ipsum dolor eiu idunt ut labore'
            },
            {
                title: 'Lunch',
                start: TODAY + 'T12:00:00',
                className: "fc-event-info",
                description: 'Lorem ipsum dolor sit amet, ut labore'
            },
            {
                title: 'Meeting',
                start: TODAY + 'T14:30:00',
                className: "fc-event-warning",
                description: 'Lorem ipsum conse ctetur adipi scing'
            },
            {
                title: 'Happy Hour',
                start: TODAY + 'T17:30:00',
                className: "fc-event-metal",
                description: 'Lorem ipsum dolor sit amet, conse ctetur'
            },
            {
                title: 'Dinner',
                start: TODAY + 'T20:00:00',
                description: 'Lorem ipsum dolor sit ctetur adipi scing'
            },
            {
                title: 'Birthday Party',
                start: TOMORROW + 'T07:00:00',
                className: "fc-event-primary",
                description: 'Lorem ipsum dolor sit amet, scing'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: YM + '-28',
                description: 'Lorem ipsum dolor sit amet, labore'
            }
        ],

        eventRender: function(event, element) {
            if (element.hasClass('fc-day-grid-event')) {
                element.data('content', event.description);
                element.data('placement', 'top');
                KTApp.initPopover(element);
            } else if (element.hasClass('fc-time-grid-event')) {
                element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>'); 
            } else if (element.find('.fc-list-item-title').lenght !== 0) {
                element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>'); 
            }
        }
    });
</script>