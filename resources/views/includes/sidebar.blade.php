<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">

      </div>

      <center><img src="{{asset('img/logo.png')}}" style="width: 60%; margin-bottom: 4%;"  alt="User Image"></center>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">


        <li class="header">Main Navigation</li>
        <!-- Optionally, you can add icons to the links -->

        @can('approved-supplier', Auth::user()->status)
              <li class="@yield('dashboard_active')"><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @endcan


          {{-- @if(Auth::user()->role =='executive')
          <li class="treeview">
              <a href="#" ><i class="fa fa-book"></i> <span>RFQ / RFP
                </span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li>
                      <a href="{{ url('/rfqList')}}" ><span>View</span></a>
                  </li>


              </ul>
          </li>
          @endif --}}



          @if (Auth::user()->role === 'cfo' || Auth::user()->role === 'ceo_po' || Auth::user()->role === 'executive')
          <li class="@yield('dashboard_active')"><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview @yield('special_active')">
          <a href="#" ><i class="fa fa-lock "></i> <span>Authorisation</span>
              <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right "></i>
      </span>
          </a>
          <ul class="treeview-menu" >
              <li class="@yield('special_procurement_active')"><a href="{{url('autorisation')}}" >View PR-Authorisation</a></li>
              @if (Auth::user()->role === 'cfo' || Auth::user()->role === 'ceo_po' || Auth::user()->role === 'executive')
              <li class="@yield('special_procurement_active')"><a href="{{url('autorisations')}}" >View SP-Authorisation</a></li>
              @endif
          </ul>
      </li>
          @endif


        @can('admin', Auth::user()->role)
      <li class="@yield('dashboard_active')"><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

              @can('finance', Auth::user()->role)

              <li class="treeview @yield('purchase_active')">
                  <a href="#" ><i class="fa fa-briefcase "></i> <span>Purchase Requisition</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right "></i>
              </span>
                  </a>
                  <ul class="treeview-menu" >
                      <li class="@yield('purchase_requisition_active')"><a href="{{route('requisitions.create')}}" > Create Purchase Requisition</a></li>
                      <li class="@yield('purchase_requisition_active')"><a href="#" > View Purchase Requisition</a></li>
                  </ul>
              </li>


              <li class="treeview @yield('travel_active')">
                  <a href="#" ><i class="fa fa-briefcase "></i> <span>Travel Requisition</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right "></i>
              </span>
                  </a>
                  <ul class="treeview-menu" >
                      <li class="@yield('travel_requisition_active')"><a href="{{route('requisitions.create')}}" > Create Travel Requisition</a></li>
                      <li class="@yield('travel_requisition_active')"><a href="{{url('travel-requisition')}}" > View Travel Requisition</a></li>

                  </ul>
              </li>


              <li class="treeview @yield('special_active')">
                  <a href="#" ><i class="fa fa-briefcase "></i> <span>Special Procurement</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right "></i>
              </span>
                  </a>
                  <ul class="treeview-menu" >
                      <li class="@yield('special_procurement_active')"><a href="{{route('requisitions.create')}}" > Create Special Procurement</a></li>
                      <li class="@yield('special_procurement_active')"><a href="#" >View Special Procurements</a></li>

                  </ul>
              </li>
              @endcan











        <li class="treeview @yield('service_providers_active')">
          <a href="#" ><i class="fa fa-user "></i> <span>Service Providers</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right "></i>
              </span>
          </a>
          <ul class="treeview-menu" >
          <li class="@yield('view_service_providers_active')"><a href="{{route('providers.index')}}" > View </a></li>
          {{-- <li class="@yield('register_service_providers_active')"><a href="{{  url('printing')}}" > Print</a></li> --}}


          </ul>
        </li>



        @endcannot


        @can('user', Auth::user()->role)

        @cannot('approved-supplier', Auth::user()->status)
        <li class=" @yield('supplier_registration_active')">
        <a href="{{route('registration.index')}}" ><i class="fa fa-wpforms"></i> <span>Supplier Registration
        </span>
        </a>
        </li>
        @endcannot

        @if(Auth::user()->status != 0)
        <li class="treeview @yield('profile_active')">
        <a href="/registration/{{Auth::id()}}" ><i class="fa fa-user"></i> <span>Profile
        </span><span class="pull-right-container">
            <i class="fa fa-angle-left pull-right "></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li class=" @yield('profile_view_active')">
              <a href="/registration/{{Auth::id()}}" ><span>View
              </span>
              </a>
            </li>
              @if(Auth::user()->status != 2)
                  @cannot('approved-supplier', Auth::user()->status)
                    @cannot('rejected-supplier', Auth::user()->status)
            <li class=" @yield('profile_edit_active')">
              <a href="/registration/{{Auth::id()}}/edit" ><span>Edit
              </span>
              </a>
            </li>
                      @endcannot
                       @endcannot
              @endif
          </ul>
        </li>



                <li class="treeview">
                    <a href="#" ><i class="fa fa-book"></i> <span>Rfq / Rfp
        </span><span class="pull-right-container">
            <i class="fa fa-angle-left pull-right "></i>
          </span>
                    </a>
                    <ul class="treeview-menu">
                        <li >
                            <a href="{{ url('/supplier_PR_Rfq')}}"><span>View SP
              </span>
                            </a>
                        </li>


                        <li >
                          <a href="{{ url('/supplier_SP_Rfq')}}"><span>View PR
            </span>
                          </a>
                      </li>


                      <li >
                        <a href="{{ url('/supplier_TR_Rfq')}}"><span>View TR
          </span>
                        </a>
                    </li>

                    </ul>
                </li>

                    <li class="treeview">
                      <a href="#" ><i class="fa fa-book"></i> <span>Quotations
                    </span><span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right "></i>
                      </span>
                      </a>
                      <ul class="treeview-menu">
                      <li >
                      <a href="{{ url('/supplier_SP_Rfq')}}"><span>View PR-Quotations
                       </span>
                       </a>
                      </li>

                      <li >
                        <a href="{{ url('/supplier_PR_Rfq')}}"><span>View SP-Quotations
                         </span>
                         </a>
                        </li>

                        <li >
                            <a href="{{ url('/supplier_TR_Rfq')}}"><span>View TR-Quotations
                             </span>
                             </a>
                            </li>

                  </ul>
              </li>


              <li class="treeview">
                <a href="#" ><i class="fa fa-book"></i> <span> Invoices
              </span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right "></i>
                </span>
                </a>
                <ul class="treeview-menu">


                    <li >
                        <a href="{{ url('/supplier_SP_Rfq')}}"><span>View PR-Invoices
                         </span>
                         </a>
                        </li>


                        <li >
                            <a href="{{ url('/supplier_PR_Rfq')}}"><span>View SP-Invoices
                             </span>
                             </a>
                            </li>

                            <li >
                                <a href="{{ url('/supplier_TR_Rfq')}}"><span>View TR-Invoices
                                 </span>
                                 </a>
                                </li>
            </ul>
        </li>


        <li class="treeview">
          <a href="#" ><i class="fa fa-book"></i> <span> Purchase Orders
        </span><span class="pull-right-container">
            <i class="fa fa-angle-left pull-right "></i>
          </span>
          </a>
          <ul class="treeview-menu">
          <li >
          <a href="{{ url('/purchase-order-all')}}"><span>View PR-Purchase Orders
           </span>
           </a>
          </li>

          <li >
            <a href="{{ url('/purc_purchase-order')}}"><span>View SP-Purchase Orders
             </span>
             </a>
            </li>
      </ul>
  </li>
        @endif

        @endcan











                @if(Auth::user()->role =='department_user' || Auth::user()->role=='admin')

              <li class="treeview @yield('purchase_active')">
                  <a href="#" ><i class="fa fa-briefcase "></i> <span>Special Procurement</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right "></i>
              </span>

                  </a>
                  <ul class="treeview-menu" >
                      {{-- @if(Auth::user()->role != 'admin') --}}
                      <li class="@yield('purchase_requisition_active')"><a href="{{route('requisitions.create')}}" > Create Special Procurement</a></li>
                      {{-- @endif --}}
                      <li class="@yield('purchase_requisition_active')"><a href="{{url('requisitions')}}" > View Special Procurement</a></li>
                      @if(Auth::user()->role=='admin' || Auth::user()->role =='executive')
                      {{-- <li>
                        <a href="#" ><span>View SP-RFQ / RFP</span></a>
                    </li> --}}
                    @endif

                  </ul>
              </li>


              <li class="treeview @yield('travel_active')">
                <a href="#" ><i class="fa fa-briefcase "></i> <span>Travel Requisition</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right "></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    {{-- @if(Auth::user()->role != 'admin') --}}
                    <li class="@yield('travel_requisition_active')"><a href="{{url('add-requisition')}}" > Create Travel Requisition</a></li>
                    {{-- @endif --}}
                    <li class="@yield('travel_requisition_active')"><a href="{{url('travel-requisition')}}" > View Travel Requisition</a></li>
                    @if(Auth::user()->role=='admin' || Auth::user()->role =='executive')
                    <li>
                      <a href="{{ url('/trvl_rfqList')}}" ><span>View TR-RFQ / RFP</span></a>
                  </li>
                  @endif
                </ul>
            </li>

              <li class="treeview @yield('special_active')">
                  <a href="#" ><i class="fa fa-briefcase "></i> <span>Purchase Requisition</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right "></i>
              </span>
                  </a>



                  <ul class="treeview-menu" >
                    {{-- @if(Auth::user()->role != 'admin') --}}
                    <li class="@yield('purchase_requisition_active')"><a href="{{route('special-procurement.create')}}" > Create Purchase Requisition</a></li>
                    {{-- @endif --}}
                    <li class="@yield('purchase_requisition_active')"><a href="{{url('special-procurement')}}" > View Purchase Requisition</a></li>
                    @if(Auth::user()->role == 'admin' || Auth::user()->role =='executive')
                    <li>
                      <a href="{{ url('/rfqList')}}" ><span>View PR-RFQ / RFP</span></a>
                  </li>
                  @endif

                </ul>
              </li>

              <li class="treeview @yield('special_active')">
                <a href="#" ><i class="fa fa-pencil "></i> <span>Quotations</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right "></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('special_procurement_active')"><a href="{{url('quotations')}}" >View PR-Quotations</a></li>
                    <li class="@yield('special_procurement_active')"><a href="{{url('spQuotation')}}" >View SP-Quotations</a></li>
                    <li class="@yield('special_procurement_active')"><a href="{{url('/quotations/travel-quotations')}}" >View TR-Quotations</a></li>
                </ul>
            </li>

            <li class="treeview @yield('special_active')">
              <a href="#" ><i class="fa fa-pencil "></i> <span>Invoices</span>
                  <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right "></i>
          </span>
              </a>
              <ul class="treeview-menu">
                  <li class="@yield('special_procurement_active')"><a href="{{url('invoice')}}" >View PR-Invoices</a></li>
                  <li class="@yield('special_procurement_active')"><a href="{{url('invoices_sp')}}" >View SP-Invoices</a></li>
                  <li class="@yield('special_procurement_active')"><a href="{{url('invoice/travel-invoices')}}" >View TR-Invoices</a></li>
              </ul>

          </li>









                 </ul>
                </li>




@endcan

@can('super_admin', Auth::user()->role)
<li class="@yield('dashboard_active')"><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


                      {{--  --}}
                      <li class="treeview @yield('user_mapping')">
                        <a href="#" ><i class="fa fa-map-marker"></i> <span>User Management</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right "></i>
                    </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li class="@yield('user_mapping_active')"><a href="{{ url('AddUser') }}" >Users</a></li>
                            <li class="@yield('user_mapping_active')"><a href="{{ url('usersMapping') }}" >Mapping</a></li>
                        </ul>
                    </li>

                    {{--  --}}


              <li class="treeview @yield('categories_active')">
                <a href="#" ><i class="fa fa-sitemap"></i> <span>Categories</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right "></i>
                    </span>
                </a>
                <ul class="treeview-menu" >
                <li class="@yield('view_categories_active')"><a href="{{route('categories.index')}}" > View </a></li>
                <li class="@yield('register_categories_active')"><a href="{{route('categories.create')}}" > Register</a></li>
                </ul>
              </li>


                <li class="treeview @yield('service_providers_active')">
                  <a href="#" ><i class="fa fa-user "></i> <span>Service Providers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right "></i>
                      </span>
                  </a>
                  <ul class="treeview-menu" >
                  <li class="@yield('view_service_providers_active')"><a href="{{route('providers.index')}}" > View </a></li>
                  {{-- <li class="@yield('register_service_providers_active')"><a href="{{  url('printing')}}" > Print</a></li> --}}
                  </ul>

                            </li>
              <li class=" @yield('contact_list_active')">
              <a href="{{route('contact-list')}}" ><i class="fa fa-address-book "></i> <span>Contact List</span>
                </a>
              </li>


  @endcan






<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
