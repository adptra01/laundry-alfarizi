<x-app>
    <x-slot name="title">Transaksi Laundry</x-slot>
    @include('layouts.table')
    <div class="card">
        <div class="card-header">
            @include('transaction.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->costumer }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $item->status == 0 ? 'warning' : 'success' }}">{{ $item->status == 0 ? 'Pengerjaan' : 'Selesai' }}</span>
                                </td>
                                <td><span
                                        class="badge bg-{{ $item->payment == 0 ? 'danger' : 'success' }}">{{ $item->payment == 0 ? 'Belum Bayar' : 'Lunas' }}</span>
                                </td>
                                <td>{{ number_format($item->totalTransaction, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        @if ($item->payment == false)
                                            <form action="{{ route('transactions.payment', $item->id) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-primary btn-sm">Bayar</button>
                                            </form>
                                        @endif
                                        @if ($item->status == false)
                                            <form action="{{ route('transactions.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                            </form>
                                        @endif
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('transactions.show', $item->id) }}" role="button">Lihat</a>
                                        <a class="btn btn-dark btn-sm"
                                            href="{{ route('transactions.invoice', $item->id) }}" role="button">Invoice</a>
                                        <form action="{{ route('transactions.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
