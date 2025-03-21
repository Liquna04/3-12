@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Chỉnh sửa cấu hình</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('settings.update', $setting->SettingID) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="BusinessName">Tên doanh nghiệp</label>
                                    <input type="text" name="BusinessName" id="BusinessName" class="form-control" value="{{ old('BusinessName', $setting->BusinessName) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="Phone">Số điện thoại</label>
                                    <input type="text" name="Phone" id="Phone" class="form-control" value="{{ old('Phone', $setting->Phone) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="Address">Địa chỉ</label>
                                    <input type="text" name="Address" id="Address" class="form-control" value="{{ old('Address', $setting->Address) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="Country">Quốc gia</label>
                                    <input type="text" name="Country" id="Country" class="form-control" value="{{ old('Country', $setting->Country) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="City">Thành phố</label>
                                    <input type="text" name="City" id="City" class="form-control" value="{{ old('City', $setting->City) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="Email">Email</label>
                                    <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email', $setting->Email) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="TimeZone">Múi giờ</label>
                                    <select name="TimeZone" id="TimeZone" class="form-control">
                                        <option value="">-- Chọn múi giờ --</option>
                                        <option value="UTC+7" {{ old('TimeZone', $setting->TimeZone) == 'UTC+7' ? 'selected' : '' }}>UTC+7 (Vietnam)</option>
                                        <option value="UTC+8" {{ old('TimeZone', $setting->TimeZone) == 'UTC+8' ? 'selected' : '' }}>UTC+8 (Singapore)</option>
                                        <option value="UTC+9" {{ old('TimeZone', $setting->TimeZone) == 'UTC+9' ? 'selected' : '' }}>UTC+9 (Japan)</option>
                                        <!-- Thêm các múi giờ khác -->
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Currency">Đơn vị tiền tệ</label>
                                    <select name="Currency" id="Currency" class="form-control">
                                        <option value="">-- Chọn đơn vị tiền tệ --</option>
                                        <option value="VND" {{ old('Currency', $setting->Currency) == 'VND' ? 'selected' : '' }}>VND (Việt Nam Đồng)</option>
                                        <option value="USD" {{ old('Currency', $setting->Currency) == 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                                        <option value="EUR" {{ old('Currency', $setting->Currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                                        <!-- Thêm các đơn vị tiền tệ khác -->
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="DefaultWeight">Trọng lượng mặc định</label>
                                    <input type="number" step="0.01" name="DefaultWeight" id="DefaultWeight" class="form-control" value="{{ old('DefaultWeight', $setting->DefaultWeight) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="TaxRate">Thuế suất (%)</label>
                                    <input type="number" step="0.01" name="TaxRate" id="TaxRate" class="form-control" value="{{ old('TaxRate', $setting->TaxRate) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="PrivacyPolicy">Chính sách bảo mật</label>
                                    <textarea name="PrivacyPolicy" id="PrivacyPolicy" rows="3" class="form-control">{{ old('PrivacyPolicy', $setting->PrivacyPolicy) }}</textarea>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="TermsOfService">Điều khoản dịch vụ</label>
                                    <textarea name="TermsOfService" id="TermsOfService" rows="3" class="form-control">{{ old('TermsOfService', $setting->TermsOfService) }}</textarea>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="ReturnPolicy">Chính sách đổi trả</label>
                                    <textarea name="ReturnPolicy" id="ReturnPolicy" rows="3" class="form-control">{{ old('ReturnPolicy', $setting->ReturnPolicy) }}</textarea>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="PromotionInfo">Thông tin khuyến mãi</label>
                                    <textarea name="PromotionInfo" id="PromotionInfo" rows="3" class="form-control">{{ old('PromotionInfo', $setting->PromotionInfo) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">Cập nhật cấu hình</button>
                            <a href="{{ route('settings.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection