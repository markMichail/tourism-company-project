<div class="treeview-animated border mx-4 my-4" style="padding:0%; float:left; width:15% ">
    <h6 class="pt-3 pl-3">Customers</h6>
    <hr>
    <ul class="treeview-animated-list mb-3">
    {{-- opened --}}
      <li>
        <a style="color:inherit;" href="/allcustomers"><div class="treeview-animated-element "><i class="fas fa-user ic-w mr-1"></i>All customers <span class="badge badge-primary badge-pill">{{$counts['customersCount']}}</span></div></a>
      </li>
      <li>
        <a style="color:inherit;" href="/allcustomers/ongoingpayments"><div  class="treeview-animated-element"><i class="fas fa-money-check-alt"></i> Ongoing payments. <span class="badge badge-primary badge-pill">{{$counts['ongoingPaymentsCount']}}</span></div></a>
      </li>
      <li>
      <a style="color:inherit;" href="/allcustomers/latepayments"><div class="treeview-animated-element"><i class="fas fa-clock ic-w mr-1"></i>Late payments <span class="badge badge-primary badge-pill">{{$counts['latePaymentsCount']}}</span></div></a>
      </li>
      <li>
        <div data-toggle="modal" data-target="#modaladdnew"  class="treeview-animated-element"><i class="fas fa-user-plus"></i> add new</div>
      </li>
    </ul>
  </div>