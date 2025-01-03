<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="text-center mt-4">
        <h1 class="display-1">?</h1>
        <p class="lead">Tidak ada data</p>
        @if (!isset($is_filtered))
        <p>Tidak ada pesanan saat ini!</p>
        @else
        <p>Tidak ada pesanan dengan status {{ $is_filtered }}</p>
        @endif

        @if (auth()->user()->role_id == 2)
        <a href="/product" class="link-info">
          <i class="fas fa-arrow-left me-1"></i>
          Pesan kopi nikmat sekarang
        </a>
        @else
        <a href="/order/order_history" class="link-info">
          <i class="fas fa-arrow-left me-1"></i>
          Ingin melihat riwayat pesanan?
        </a>
        @endif
      </div>
    </div>
  </div>
</div>