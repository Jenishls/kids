<!-- <div>
  <form id="calendarFilter">
    <div>
      <label for="">Order no</label>
      <input type="text" name="order_no" class="form-control" aria-labelled-by="js--calendar-filter">
    </div>
    <div>
      <label for="">Phone no</label>
      <input type="text" name="phone_no" class="form-control" aria-labelled-by="js--calendar-filter">
    </div>
    <div>
      <label for="">Zip</label>
      <input type="text" name="zip" class="form-control" aria-labelled-by="js--calendar-filter">
    </div>
    <div>
      <label for="">Client</label>
      <input type="text" name="name" class="form-control" value="shubhu" aria-labelled-by="js--calendar-filter">
    </div>
    <div>
      <label for="">Type</label>
      <select name="type" id="" aria-labelled-by="js--calendar-filter">
        <option value="all">all</option>
        <option value="delivery">delvery</option>
        <option value="pickup">pickup</option>
      </select>
    </div>
  </form>
</div> -->

<!-- Search Row -->
<div class="row calendar_search_row" style="padding-bottom:10px;">
  <div class="col-md-12 order-1  serach_col user_search_col calendarSearchCol">
    <form id="calendarFilter">
      <div class="form-group m-form__group row align-items-center ">
        <!-- Type -->
        <div class="col-md-2 col-sm-2">
          <div class="input-group input-group-sm userInputGroup">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary searchByRoleSelectBtn waves-effect waves-light" type="button">Type</button>
            </div>
            <select name="type" class="custom-select" id="type-selectpicker">
              <option value="all" selected>All</option>
              <option value="delivery">Delivery</option>
              <option value="pickup">Pickup</option>
            </select>
          </div>
        </div>
        <!-- Order no -->
        <div class="col-md-2 col-sm-2">
          <div class="input-group mb-3 input-group-sm userInputGroup">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Order no</span>
            </div>
            <input type="text" class="form-control basic--search" aria-labelled-by="js--calendar-filter" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="" autocomplete="off" name="order_no">
          </div>
        </div>
        <!-- Client -->
        <div class="col-md-2 col-sm-2">
          <div class="input-group mb-3 input-group-sm userInputGroup">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Client</span>
            </div>
            <input type="text" class="form-control basic--search" name="name" aria-labelled-by="js--calendar-filter" aria-describedby="inputGroup-sizing-default" autocomplete="off">
          </div>
        </div>
        <!-- Phone no -->
        <div class="col-md-2 col-sm-2">
          <div class="input-group mb-3 input-group-sm userInputGroup">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Phone no</span>
            </div>
            <input type="text" class="form-control basic--search" aria-labelled-by="js--calendar-filter" name="phone_no" aria-describedby="inputGroup-sizing-default">
          </div>
        </div>
        <!-- Zip -->
        {{-- <div class="col-md-2 col-sm-2">
          <div class="input-group mb-3 input-group-sm userInputGroup">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Zip</span>
            </div>
            <input type="text" class="form-control basic--search" name="zip" aria-labelled-by="js--calendar-filter" aria-describedby="inputGroup-sizing-default" autocomplete="off">
          </div>
        </div> --}}
      </div>
    </form>
  </div>
</div>
<hr>
<div id="order--calendar"></div>
<script>
  calendar();

  function calendar() {
    $("#order--calendar").fullCalendar({
      height: 700,
      defaultView: "month",
      views: {
        pastAndFutureView: {
          visibleRange: function(currentDate) {
            // Generate a new date for manipulating in the next step
            var startDate = new Date(currentDate.valueOf());
            var endDate = new Date(currentDate.valueOf());

            // Adjust the start & end dates, respectively
            startDate.setDate(startDate.getDate() - 1); // One day in the past
            endDate.setDate(endDate.getDate() + 2); // Two days into the future

            return {
              start: startDate,
              end: endDate
            };
          }
        }
      },
      eventLimit: true,
      navLinks: true,
      loading: function(loading) {
        if (loading) {
          $('body').append('<div class="m-loader page" rel="pageLoader"></div>');
        } else {
          $(document).find('.m-loader.page').remove();
        }
      },
      header: {
        left: 'title',
        right: 'prev,next month,basicWeek,basicDay,listWeek'
      },
      views: {
        month: {
          eventLimit: 5
        }
      },
      eventSources: [

        {
          id: 'calendar_dashboard',
          url: '/admin/calendar/order_events',
          data: function() {
            return {
              search: $('#calendarFilter').serializeArray()
            }
          }
        }

      ],

      editable: false,
      droppable: false,
      dayClick: function(date, jsEvent, view) {

      },
      eventRender: function(event, el) {
        //   if(event.rendering == 'background'){

        //     el.css({"vertical-align" : "middle", "opacity" : '0.8'});

        //     el.append(`<h3 style="color:black !important; opacity : 1; font-size: 14px; text-align: center">${event.title}</h3>`);

        //   }
        var tooltip = $(el).tooltip({
          title: event.description ? event.description : event.title,
          html: true,
          placement: 'top',
          trigger: 'hover',
          container: 'body'
        });

      },
      eventAfterAllRender(event, element, view) {
        let nextday;
        /*
          $(".fc-event").each(function() {
  
            const $event = $(this);
            if ($event.data("fcSeg")) {
              // store data so the calendar knows to render an event upon drop
              const event = $event.data("fcSeg").footprint.eventDef;
              $event.data("event", event);
  
              // make the event draggable using jQuery UI
              $event.draggable({
                disabled: true,
                helper: "clone",
                revert: true,
                revertDuration: 0,
                zIndex: 999,
                stop(event, ui) {
                  // when dragging of a copied event stops we must set them
                  // copyable again if the control key is still held down
                  if (ctrlIsPressed) {
                    setEventsCopyable(true);
                  }
                }
              });
  
              var eventStart = new Date(event.dateProfile.start._d);
              var eventEnd = new Date(event.dateProfile.end._d);
  
              
              nextday = nextday ? new Date(moment(nextday, 'YYYY-MM-DD').add(1, 'days').toString()) : eventStart;
  
              if(nextday.getTime() !== eventEnd.getTime()){
  
  
                  $(".fc-bg td[data-date='"+ moment(nextday, 'YYYY-MM-DD').format('YYYY-MM-DD') +"']").css('background-color','pink');
  
  
              }
              
            }
          })
          */
      },
      eventMouseover: function(calEvent, domEvent) {


      },
      eventClick: function(calEvent, jsEvent, view) {

        //   let request= {         
        //     method: 'get',
        //     loader: true

        //   };

        //   if(calEvent.type === "volunteer"){

        //     request.url = `vol-calendar/${calEvent.vol_id}/ts_id/${calEvent.id}`;

        //     $('.clear-all-templates').hide();

        //   }else if(calEvent.type === "sites"){

        //     request.url = `site-calendar/${calEvent.site_id}/period_id/${calEvent.period_id}/${calEvent.date}`;

        //     $('.clear-all-templates').hide();          

        //   }else{


        //     // request.url = 'time-sheets/add/new?id='+calEvent.id;     

        //   }
        //   //remove this return

        //   if(calEvent.type !== "volunteer" && calEvent.type !== 'sites') return;

        //   sendAjax(request, function(response){
        //     $('.m_calendar_time_Changable').slideUp('slow');
        //     $('#m_calendar_time_detail').show();
        //     $('.calendar-view-act-btns').show();
        //     $('.calendar-default-act-btns').hide(); //printbtn
        //     $('#m_calendar_time_detail').html(response);
        //   });      
      },
      eventMouseout: function(calEvent, domEvent) {

        //   $("body").find('div[id*=events-layer]').remove();
      },
    });
  }

  $(function() {
    let pendingInterval = '';

    function updateInterval($time = 1500) {
      clearInterval(pendingInterval)
      pendingInterval = setTimeout(function() {
        $("#order--calendar").fullCalendar('refetchEvents');
      }, $time);
      return pendingInterval;
    }

    $(document)
      .off('input', 'input[aria-labelled-by="js--calendar-filter"]')
      .on('input', 'input[aria-labelled-by="js--calendar-filter"]',
        function(e) {
          e.preventDefault();
          updateInterval();
        });

    $('#type-selectpicker').selectpicker().on('changed.bs.select', function() {
      updateInterval(0);
    });

    // $(document)
    //   .off('change', 'select[aria-labelled-by="js--calendar-filter"]')
    //   .on('change', 'select[aria-labelled-by="js--calendar-filter"]',
    //     function(e) {
    //       e.preventDefault();
    //       updateInterval(0);
    //     });
  })
</script>