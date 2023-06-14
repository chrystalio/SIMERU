@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Karyawan</h1>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="card-body bg-white my-2 rounded">
                    <form action="">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number (US Format)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control phone-number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password Strength</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control pwstrength" data-indicator="pwindicator">
                                </div>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            $
                                        </div>
                                    </div>
                                    <input type="text" class="form-control currency">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Purchase Code</label>
                                <input type="text" class="form-control purchase-code" placeholder="ASDF-GHIJ-KLMN-OPQR">
                            </div>
                            <div class="form-group">
                                <label>Invoice</label>
                                <input type="text" class="form-control invoice-input">
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD">
                            </div>
                            <div class="form-group">
                                <label>Credit Card</label>
                                <input type="text" class="form-control creditcard">
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" class="form-control inputtags">
                            </div>
                        </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
