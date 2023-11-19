@extends('frontend_layouts/master')

@section('title', 'Checkout')

@section('content')
  <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ route('dashboard_frontend.index') }}">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="Checkout_section mt-60">
    <div class="container">
      <div class="checkout_form">
        <form id="checkoutForm" action="{{ route('checkout.checkout_pay') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="footer_contact">
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <ul>
                                <li><i class="zmdi zmdi-phone-setting"></i><span>Phone:</span>{{ $user->no_telp }}</li>
                                <li><i class="zmdi zmdi-email"></i><span>Email:</span> {{ $user->email }}</li>
                                @if (isset($user->alamats[0]->alamat_spesifik))
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat *</label>
                                        <select class="form-select" id="alamat" name="alamat">
                                            @foreach ($user->alamats as $alamat)
                                                <option value="{{ $alamat->city_id }}">
                                                    {{ $alamat->alamat_spesifik }}, {{ $alamat->city_name }}, {{ $alamat->province }}, {{ $alamat->postal_code }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat *</label>
                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" rows="3" required></textarea>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Shipping</label>
                                    <span style="font-size: 12px; color: red;"> (*silahkan pilih shipping)</span>
                                    <select class="form-select" id="kurir" name="kurir">
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS</option>
                                    </select>
                                </div>
                                <div id="result_ongkir">
                                    <input type="hidden" name="ongkir" id="service_cost_value">
                                </div>
                            </ul>
                            <br>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan (Opsional)</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Your order</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    @php
                                        $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                        $total = $hargaFinal * $item->quantity
                                    @endphp
                                    <tr>
                                        <td>{{ $item->produk->nama }}<strong> × {{ $item->quantity }}</strong></td>
                                        <td>Rp {{ number_format($total, 2) }}</td>
                                    </tr>
                                @endforeach
                                <input type="hidden" name="berat" id="berat" value="{{ $totalBerat }}">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>Rp {{ number_format($hargaTotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td id="ongkir"></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <input type="hidden" name="total_harga" value="{{ $hargaTotal }}">
                                    <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">
                                    <td><strong id="hargaTotal">Rp {{ number_format($hargaTotal, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="order_button">
                            <button  type="submit" id="bayarButton" style="display: none">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- <button class="btn btn-secondary" id="check_ongkir">Check Ongkir</button> --}}
      </div>
    </div>
  </div>
@endsection

@section('additional_js')
<script>
    const hargaTotal= @json($hargaTotal);
</script>
<script>
    $(document).ready(function () {
      $('#kurir').change(function (e) {
        e.preventDefault(); // Hindari pengiriman formulir secara default

        // Dapatkan nilai yang dipilih dari dropdown alamat
        var selectedCityId = $('#alamat').find(":selected").val();
        var berat = $('#berat').val();
        var kurir = $('#kurir').find(":selected").val();
        // console.log(kurir)

        // Lakukan permintaan Ajax untuk cek ongkir
        $.ajax({
            url: '{{ route("checkout.checkOngkir") }}', // Ganti dengan rute yang sesuai di Laravel
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                origin: 114,
                destination: selectedCityId,
                weight: berat,
                courier: kurir
            },
            success: function (data) {
                var result = data.result;
                // console.log(result);

                if (result && Array.isArray(result) && result.length > 0) {
                    // Sisanya tetap sama seperti sebelumnya
                    var selectInput = $('<select class="form-select">').attr('id', 'ongkir_service').attr('name', 'ongkir_service');
                    result.forEach(function (ongkir) {
                        ongkir.costs.forEach(function (service) {
                            var formattedValue = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(service.cost[0].value);
                            var optionText = service.service + ' - ' + service.description + ' (' + formattedValue + ')';
                            var optionValue = ongkir.code + '-' + service.service + '-' + service.cost[0].value;

                            selectInput.append($('<option>').attr('value', optionValue).text(optionText));
                        });
                    });

                    var selectedServiceValueDiluar = selectInput.first().val();
                    var selectedServiceCostDiluar = parseFloat(selectedServiceValueDiluar.split('-')[2]);
                    var formattedSelectedServiceCostDiluar = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(selectedServiceCostDiluar);

                    $('#ongkir').html(formattedSelectedServiceCostDiluar);

                    var totalHargaWithShippingDiluar = hargaTotal + selectedServiceCostDiluar;
                    var formattedTotalHargaWithShippingDiluar = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(totalHargaWithShippingDiluar);
                    $('#hargaTotal').html(formattedTotalHargaWithShippingDiluar);

                    $('#result_ongkir').html(selectInput);
                    $("#bayarButton").css("display", "block");
                    $('#ongkir_service').change(function () {
                        // Mendapatkan nilai yang dipilih oleh pengguna
                        var selectedServiceValue = $('#ongkir_service').find(":selected").val();
                        var selectedServiceCost = parseFloat(selectedServiceValue.split('-')[2]);
                        var formattedSelectedServiceCost = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(selectedServiceCost);

                        $('#ongkir').html(formattedSelectedServiceCost);

                        // Menambahkan biaya pengiriman yang dipilih ke total pesanan
                        var totalHargaWithShipping = hargaTotal + selectedServiceCost;
                        var formattedTotalHargaWithShipping = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(totalHargaWithShipping);

                        // Update elemen HTML yang menunjukkan total harga pesanan
                        $('#hargaTotal').html(formattedTotalHargaWithShipping);
                    });
                } else {
                    console.error('Invalid data structure or empty result.');
                }
            },
            error: function () {
                // Handle error jika ada
                console.error('Error in checking shipping cost.');
            }
        });
      });
    });
</script>
@endsection