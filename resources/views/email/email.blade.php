<h2>{{ $user->username }}</h2>
<h3>Yêu cầu lấy lại mật khẩu mới</h3>
<h5>Mật khẩu mới của bạn là: {{ $passNew }}</h5>
<p>Bạn có thể đăng nhập vào bằng mật khẩu mới <a href="{{ route('login.index') }}">tại đây</a></p>
<p>Và sau khi đăng nhập hãy vào mục đổi mật khẩu khi click vào avata</p>
