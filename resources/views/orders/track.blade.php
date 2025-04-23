@extends('layouts.admin')

@section('contents')

<section class="vh-100" style="background-color: #8c9eff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-stepper" style="border-radius: 16px;">

          <div class="card-body p-5">

            <div class="d-flex justify-content-between align-items-center mb-5">
              <div>
                <h5 class="mb-0">INVOICE <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
              </div>
              <div class="text-end">
                <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
              </div>
            </div>

            <!-- Progress Bar -->
            <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
              <li class="step0 {{ in_array($order->order_status, ['order_confirm', 'order_packaging', 'order_ontheway', 'order_arrived']) ? 'active' : '' }} text-center" id="step1"></li>
              <li class="step0 {{ in_array($order->order_status, ['none', 'order_packaging', 'order_ontheway', 'order_arrived']) ? 'active' : '' }} text-center" id="step2"></li>
              <li class="step0 {{ in_array($order->order_status, ['none', 'order_ontheway', 'order_arrived']) ? 'active' : '' }} text-center" id="step3"></li>
              <li class="step0  {{ in_array($order->order_status, ['none', 'order_arrived']) ? 'active' : '' }} text-center" id="step3"></li>
            </ul>

            <!-- Order Status Buttons -->
            <div class="d-flex justify-content-between">
              <div class="d-lg-flex align-items-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-1">
                  <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                </a>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">Processed</p>
                </div>
              </div>

              <div class="d-lg-flex align-items-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-2">
                  <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                </a>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">Packaging</p>
                </div>
              </div>

              <div class="d-lg-flex align-items-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-3">
                  <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i> 
                </a>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">On the Way</p>
                </div>
              </div>

              <div class="d-lg-flex align-items-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-4">
                  <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i> 
                </a>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">Arrived</p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modals -->

<!-- Order Processed Modal -->
<div class="modal" tabindex="-1" id="modal-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Confirmed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Confirm order now...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <form action="{{ route('orders.confirmed', $order->id) }}" method="GET">
          <button type="submit" class="btn btn-primary"> Yes </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Order Packaging Modal -->
<div class="modal" tabindex="-1" id="modal-2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Packaging</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Confirm that the order is being packaged.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <form action="{{ route('orders.packaging', $order->id) }}" method="GET">
          <button type="submit" class="btn btn-primary"> Yes </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Order On the Way Modal -->
<div class="modal" tabindex="-1" id="modal-3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order On the Way</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Confirm that the order is on the way.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <form action="{{ route('orders.ontheway', $order->id) }}" method="GET">
          <button type="submit" class="btn btn-primary"> Yes </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Order Arrived Modal -->
<div class="modal" tabindex="-1" id="modal-4">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Arrived</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Confirm that the order has arrived at the destination.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <form action="{{ route('orders.arrived', $order->id) }}" method="GET">
          <button type="submit" class="btn btn-primary"> Yes </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
