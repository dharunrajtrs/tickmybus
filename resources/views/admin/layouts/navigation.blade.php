@php
if(str_contains((string)request()->path(),'translations')){
  $main_menu = 'settings';
  $sub_menu = 'translations';
}
if(str_contains((string)request()->path(),'dashboard')){
  $main_menu = 'dashboard';
  $sub_menu = '';
}
@endphp

<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      @if(auth()->user()->can('access-dashboard'))
      <li class="{{'dashboard' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/dashboard')}}">
          <i class="fa fa-tachometer"></i> <span>@lang('pages_names.dashboard')</span>
        </a>
      </li>
      @endif

       {{-- @if(auth()->user()->can('view-settings'))
      <li class="treeview {{ 'settings' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-cogs"></i>
          <span> @lang('pages_names.settings') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          @if(auth()->user()->can('get-all-roles'))
          <li class="{{ 'roles' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/roles')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.roles')</a>
          </li>
          @endif
          @if(auth()->user()->can('view-system-settings'))
          <li class="{{ 'system_settings' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/system/settings')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.system_settings')</a>
          </li>
          @endif --}}
          {{-- @if(auth()->user()->can('view-translations'))
          <li class="{{ 'translations' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/translations')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.translations')</a>
          </li>
          @endif --}}
        {{-- </ul>
      </li>
      @endif --}}
      {{-- @if(auth()->user()->roles->pluck('slug')->contains('super-admin'))
       @if(auth()->user()->can('admin'))
      <li class="{{'admin' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/admins')}}">
          <i class="fa fa-user-circle-o"></i> <span>@lang('pages_names.admins')</span>
        </a>
      </li>
      @endif
      @endif --}}
      @if(auth()->user()->can('master-data'))
      <li class="treeview {{ 'master' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-code-fork"></i>
          <span> @lang('pages_names.set_up') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">

          {{-- @if(auth()->user()->can('manage-country'))
          <li class="{{ 'country' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/country')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.country')</a>
          </li>
          @endif --}}
          {{-- @if(auth()->user()->can('manage-city'))
          <li class="{{ 'city' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/city')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.city')</a>
          </li>
          @endif --}}
          @if(auth()->user()->can('manage-owner-needed-document'))
          <li class="{{ 'owner_needed_document' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/owner_needed_doc')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.bus_operators_needed_doc')</a>
          </li>
          @endif
          @if(auth()->user()->can('manage-fleet-needed-document'))
          <li class="{{ 'fleet_needed_document' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/fleet_needed_doc')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.bus_needed_doc')</a>
          </li>
          @endif
          @if(auth()->user()->can('manage-fleet-needed-document'))
          <li class="{{ 'boarding_point' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/admin_boarding_point')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.rotues')</a>
          </li>
          @endif

         @if(auth()->user()->can('manage_amentity'))
         <li class="{{ 'manage_amentity' == $sub_menu ? 'active' : '' }}">
           <a href="{{url('/amenity')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.amenities')</a>
         </li>

         @endif
         @if(auth()->user()->can('manage-driver-needed-document'))
          <li class="{{ 'needed_document' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/needed_doc')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.needed_doc')</a>
          </li>
          @endif
          {{--
           @if(auth()->user()->can('manage-boarding-point'))
          <li class="{{ 'boarding_point' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/boarding_point')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.boarding_point')</a>
          </li>
          @endif --}}
<!--           @if(auth()->user()->can('manage-rest-stop'))
          <li class="{{ 'rest_stop' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/rest')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.rest_stop')</a>
          </li>
          @endif  -->

        </ul>
      </li>
      @endif
{{--
      @if(auth()->user()->can('service_location'))
      <li class="{{'service_location' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/service_location')}}">
          <i class="fa fa-map-marker"></i> <span>@lang('pages_names.city_service_location')</span>
        </a>
      </li>
      @endif --}}


      @if(auth()->user()->roles->pluck('slug')->contains('owner'))

      <li class="treeview {{ 'master' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-code-fork"></i>
          <span> @lang('pages_names.set_up') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">

          @if(auth()->user()->roles->pluck('slug')->contains('owner'))
          @if(auth()->user()->can('manage_seat_layout'))
          <li class="{{ 'fleet_seat_layout' == $sub_menu ? 'active' : '' }}">
              <a href="{{url('/fleet_seat_layout')}}">  <i class="fa fa-code-fork"></i>@lang('pages_names.seat_layout')</a>
            </li>
       @endif
       @endif
       @if(auth()->user()->roles->pluck('slug')->contains('owner'))
       @if(auth()->user()->can('manage-boarding-point'))
       <li class="{{ 'boarding_point' == $sub_menu ? 'active' : '' }}">
         <a href="{{url('/boarding_point')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.rotues')</a>
       </li>
       @endif

       @endif

        </ul>
    </li>
@endif






        @if(auth()->user()->can('manage-owner'))
            <li class="{{ 'manage_owners' == $main_menu ? 'active menu-open' : '' }}">
                <a href="{{url('/owners/by_area')}}">
                    <i class="fa fa-map-marker"></i> <span>@lang('pages_names.bus_operators')</span>
                  </a>
              </li>
            @endif
            {{-- @if(auth()->user()->roles->pluck('slug')->contains('owner'))
            @if(auth()->user()->can('manage-city'))
         <li class="{{ 'city' == $sub_menu ? 'active' : '' }}">
           <a href="{{url('/city')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.city')</a>
         </li>
         @endif
         @endif --}}


            @if(auth()->user()->roles->pluck('slug')->contains('owner'))
             @if(auth()->user()->can('manage-fleet'))
            <li class="{{ $main_menu == 'manage_fleet' ? 'active' : ''}}">
                <a href="{{ route('viewFleet') }}">
                    <i class="fa fa-bus"></i>
                    <span> {{ trans('pages_names.add_bus') }} </span>
                </a>
            </li>
            @endif
            @endif

  {{-- @if(auth()->user()->can('seat_layout'))
      <li class="treeview {{ 'seat_layout' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-code-fork"></i>
          <span> @lang('pages_names.seat_layout') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          @if(auth()->user()->can('manage_seat_layout'))
          <li class="{{ 'fleet_seat_layout' == $main_menu ? 'active' : '' }}">
            <a href="{{url('/fleet_seat_layout')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.fleet_seat_layout')</a>
          </li>
          @endif

        </ul>
      </li>
    @endif --}}




    @if(auth()->user()->roles->pluck('slug')->contains('owner'))
  @if(auth()->user()->can('view_journey'))
        <li class="treeview {{ 'view_journey' == $main_menu ? 'active menu-open' : '' }}">
          <a href="javascript: void(0);">
            <i class="fa fa-map"></i>
            <span> @lang('pages_names.schedule') </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
         @if(auth()->user()->can('journey'))

            <li class="{{'journey' == $sub_menu ? 'active' : '' }}">
              <a href="{{url('/journey')}}">
                <i class="fa fa-circle-thin"></i> <span>@lang('pages_names.add_schedule')</span>
              </a>
            </li>
          @endif
         @if(auth()->user()->can('completed-journey'))
            <li class="{{'completed-journey' == $sub_menu ? 'active' : '' }}">
              <a href="{{url('/journey/completed')}}">
                <i class="fa fa-circle-thin"></i> <span>@lang('pages_names.completed')</span>
              </a>
            </li>
          @endif
         @if(auth()->user()->can('completed-journey'))
            <li class="{{'cancelled-journey' == $sub_menu ? 'active' : '' }}">
              <a href="{{url('/journey/cancelled')}}">
                <i class="fa fa-circle-thin"></i> <span>@lang('pages_names.cancelled')</span>
              </a>
            </li>
          @endif
        </ul>
      </li>
     @endif
     @endif
  {{-- @if(auth()->user()->can('view_tickets'))
      <li class="treeview {{ 'view_tickets' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
         <i class="fa fa-ticket" aria-hidden="true"></i>
          <span> @lang('pages_names.tickets') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

        @if(auth()->user()->can('booked_tickets'))
          <li class="{{'tickets' == $main_menu ? 'active' : '' }}">
            <a href="{{url('tickets/booked_tickets')}}">
             <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>@lang('pages_names.bookings')</span>
            </a>
          </li>
          @endif
          @if(auth()->user()->can('cancelled_tickets'))
          <li class="{{ 'tickets' == $main_menu ? 'active' : '' }}">
            <a href="{{url('tickets/cancelled_tickets')}}"><i class="fa fa-thumbs-down" aria-hidden="true"></i>@lang('pages_names.cancelled_bookings')</a>
          </li>
          @endif
        </ul>
      </li>
    @endif --}}
    @if(auth()->user()->roles->pluck('slug')->contains('owner'))
       @if(auth()->user()->can('fleet-drivers-menu'))
        <li class="treeview {{ 'fleet-drivers' == $main_menu ? 'active menu-open' : '' }}">
          <a href="javascript: void(0);">
            <i class="fa fa-users"></i>
            <span> @lang('pages_names.drivers') </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            @if(auth()->user()->can('view-approved-fleet-drivers'))
            <li class="{{ 'driver_details' == $sub_menu ? 'active' : '' }}">
              <a href="{{url('/fleet-drivers')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.add_drivers')</a>
            </li>
            @endif
{{--
         @if(auth()->user()->can('fleet-drivers-waiting-for-approval'))
            <li class="{{ 'driver_approval_pending' == $sub_menu ? 'active' : '' }}">
              <a href="{{url('/fleet-drivers/waiting-for-approval')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.approval_pending_drivers')</a>
            </li>
            @endif
          </ul> --}}

        </li>
      @endif
      @endif
    {{-- @if(auth()->user()->can('user-menu'))
      <li class="treeview {{ 'users' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-user"></i>
          <span> @lang('pages_names.users') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          @if(auth()->user()->can('view-users'))
          <li class="{{ 'user_details' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/users')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.user_details')</a>
          </li>
          @endif
        </ul>
      </li>
      @endif --}}
{{--
      @if(auth()->user()->can('view-sos'))
      <li class="{{'emergency_number' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/sos')}}">
          <i class="fa fa-heartbeat"></i> <span>@lang('pages_names.emergency_number')</span>
        </a>
      </li>
      @endif

      @if(auth()->user()->can('manage-promo'))
      <li class="{{'manage-promo' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/promo')}}">
          <i class="fa fa-gift"></i> <span>@lang('pages_names.promo_codes')</span>
        </a>
      </li>
      @endif --}}

      {{-- @if(auth()->user()->can('notifications'))
      <li class="treeview {{ 'notifications' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-paper-plane"></i>
          <span> @lang('pages_names.notifications') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          @if(auth()->user()->can('view-notifications'))
          <li class="{{ 'push_notification' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/notifications/push')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.push_notification')</a>
          </li>
          @endif
        </ul>
      </li>
      @endif --}}
      {{-- @if(auth()->user()->can('cancellation-reason'))
      <li class="{{'cancellation-reason' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/cancellation')}}">
          <i class="fa fa-ban"></i> <span>@lang('pages_names.cancellation')</span>
        </a>
      </li>
      @endif --}}

      {{-- @if(auth()->user()->can('complaints'))
      <li class="treeview {{ 'complaints' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-list-alt"></i>
          <span> @lang('pages_names.complaints') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          @if(auth()->user()->can('complaint-title'))
          <li class="{{ 'complaint-title' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/complaint/title')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.complaint_title')</a>
          </li>
          @endif --}}
{{--
          @if(auth()->user()->can('user-complaint'))
          <li class="treeview {{ 'user-complaint' == $sub_menu ? 'active' : '' }}">
             <a href="javascript: void(0);">
                <i class="fa fa-circle-thin"></i>
                <span> @lang('pages_names.user_complaints') </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>

             <ul class="treeview-menu">
               <li class="{{ 'user-general-complaint' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/complaint/users/general')}}">@lang('pages_names.general_complaints')</a></li>

               <li class="{{ 'user-request-complaint' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/complaint/users/request')}}">@lang('pages_names.request_complaints')</a></li>
             </ul>
          </li>
          @endif --}}

          {{-- @if(auth()->user()->can('owner-complaint'))
          <li class="treeview {{ 'owner-complaint' == $sub_menu ? 'active' : '' }}">
             <a href="javascript: void(0);">
                <i class="fa fa-circle-thin"></i>
                <span> @lang('pages_names.owner_complaints') </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a> --}}

          {{--   <a href="{{url('/complaint/owner')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.owner_complaints')</a> --}}
             {{-- <ul class="treeview-menu">
               <li class="{{ 'owner-general-complaint' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/complaint/owner/general')}}">@lang('pages_names.general_complaints')</a></li>

               <li class="{{ 'owner-request-complaint' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/complaint/owner/request')}}">@lang('pages_names.request_complaints')</a></li>
             </ul>
          </li>
          @endif


        </ul>
      </li>
      @endif --}}

      {{-- @if(auth()->user()->can('reports'))
      <li class="treeview {{ 'reports' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-file-pdf-o"></i>
          <span> @lang('pages_names.reports') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          @if(auth()->user()->can('user-report'))
          <li class="{{ 'user_report' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/reports/user')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.user_report')</a>
          </li>
          @endif
          @if(auth()->user()->can('owner-report'))
          <li class="{{ 'owner_report' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/reports/owner')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.owner_report')</a>
          </li>
          @endif

          @if(auth()->user()->can('finance-report'))
          <li class="{{ 'finance_report' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/reports/travel')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.finance_report')</a>
          </li>
          @endif
        </ul>
      </li>
      @endif --}}


      {{-- @if(auth()->user()->can('manage-faq'))
      <li class="{{'faq' == $main_menu ? 'active' : '' }}">
        <a href="{{url('/faq')}}">
          <i class="fa fa-question-circle"></i> <span>@lang('pages_names.faq')</span>
        </a>
      </li>
      @endif --}}

      {{-- @if(auth()->user()->can('website'))
      <li class="treeview {{ 'website' == $main_menu ? 'active menu-open' : '' }}">
        <a href="javascript: void(0);">
          <i class="fa fa-desktop"></i>
          <span> @lang('pages_names.website') </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
        @if(auth()->user()->can('web-header'))
          <li class="{{ 'header' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/header')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.header')</a>
          </li>
          @endif
          <!-- @if(auth()->user()->can('web-footer'))
          <li class="{{ 'footer' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/footer')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.footer')</a>
          </li>
          @endif -->
          @if(auth()->user()->can('web-home'))
          <li class="{{ 'home' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/home')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.home')</a>
          </li>
          @endif
          @if(auth()->user()->can('web-about'))
          <li class="{{ 'about' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/about')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.about')</a>
          </li>
          @endif

          @if(auth()->user()->can('web-service'))
          <li class="{{ 'service' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/service')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.service')</a>
          </li>
          @endif
          @if(auth()->user()->can('web-contact'))
          <li class="{{ 'contact' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/contact')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.contact')</a>
          </li>
          @endif
          @if(auth()->user()->can('web-privacy'))
          <li class="{{ 'privacy' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/privacy')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.privacy')</a>
          </li>
          @endif
          @if(auth()->user()->can('web-terms'))
          <li class="{{ 'terms' == $sub_menu ? 'active' : '' }}">
            <a href="{{url('/term')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.terms')</a>
          </li>
          @endif
        </ul>
      </li>
      @endif --}}

    </ul>
  </section>
</aside>
