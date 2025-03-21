@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Cấu hình hệ thống</h4>
                    @if(count($settings) == 0)
                        <a href="{{ route('settings.create') }}" class="btn btn-primary">Thêm cấu hình mới</a>
                    @endif
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(count($settings) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="200">Thông tin</th>
                                        <th>Giá trị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <td colspan="2" class="bg-light text-center">
                                                <strong>Thông tin cơ bản</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên doanh nghiệp</td>
                                            <td>{{ $setting->BusinessName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $setting->Phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $setting->Email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $setting->Address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thành phố</td>
                                            <td>{{ $setting->City }}</td>
                                        </tr>
                                        <tr>
                                            <td>Quốc gia</td>
                                            <td>{{ $setting->Country }}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="bg-light text-center">
                                                <strong>Cấu hình hệ thống</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Múi giờ</td>
                                            <td>{{ $setting->TimeZone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Đơn vị tiền tệ</td>
                                            <td>{{ $setting->Currency }}</td>
                                        </tr>
                                        <tr>
                                            <td>Trọng lượng mặc định</td>
                                            <td>{{ $setting->DefaultWeight }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thuế suất</td>
                                            <td>{{ $setting->TaxRate }}%</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="bg-light text-center">
                                                <strong>Chính sách & Điều khoản</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Chính sách bảo mật</td>
                                            <td>
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    {{ $setting->PrivacyPolicy }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Điều khoản dịch vụ</td>
                                            <td>
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    {{ $setting->TermsOfService }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Chính sách đổi trả</td>
                                            <td>
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    {{ $setting->ReturnPolicy }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thông tin khuyến mãi</td>
                                            <td>
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    {{ $setting->PromotionInfo }}
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <a href="{{ route('settings.edit', $setting->SettingID) }}" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i> Chỉnh sửa cấu hình
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            Chưa có cấu hình nào được thiết lập. Vui lòng tạo cấu hình mới.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection