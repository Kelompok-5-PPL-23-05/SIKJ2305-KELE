<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login E-Rapor PKBM - Pusat Kegiatan Belajar Masyarakat">
    <title>Login | E-RAPOR PKBM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #c8d3e8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* ── Card wrapper ── */
        .login-card {
            display: flex;
            width: 100%;
            max-width: 900px;
            min-height: 520px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        /* ── Left panel ── */
        .left-panel {
            flex: 1;
            background-color: #dce6f5;
            padding: 36px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: #fff;
            border-radius: 999px;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 500;
            color: #1a1a2e;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            width: fit-content;
        }

        .brand-badge .icon {
            width: 28px;
            height: 28px;
            background: #1a1a2e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-badge .icon svg {
            width: 16px;
            height: 16px;
            fill: #fff;
        }

        .left-main {
            padding: 0 4px;
        }

        .left-main h1 {
            font-size: 36px;
            font-weight: 900;
            color: #1a1a2e;
            letter-spacing: -0.5px;
            line-height: 1.1;
            margin-bottom: 14px;
        }

        .left-main p {
            font-size: 13.5px;
            color: #3a4a6a;
            line-height: 1.7;
            text-align: justify;
            max-width: 340px;
        }

        .left-footer {
            font-size: 12.5px;
            color: #3a4a6a;
            line-height: 1.6;
        }

        /* ── Right panel ── */
        .right-panel {
            flex: 1;
            background-color: #8fa3c3;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 8px;
            letter-spacing: 0.1px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 16px;
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: #1a1a2e;
            outline: none;
            transition: box-shadow 0.2s ease, transform 0.15s ease;
        }

        .form-group input:focus {
            box-shadow: 0 0 0 3px rgba(255,255,255,0.5);
            transform: translateY(-1px);
        }

        .form-group input::placeholder {
            color: #b0b8c8;
        }

        /* Error message */
        .error-message {
            background: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.35);
            color: #fff;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* LOGIN button */
        .btn-login {
            display: block;
            width: fit-content;
            margin: 10px auto 0;
            padding: 12px 48px;
            background-color: #ffffff;
            color: #1a1a2e;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            letter-spacing: 1.5px;
            border: 2px solid #e0e6ef;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
        }

        .btn-login:hover {
            background-color: #1a1a2e;
            color: #ffffff;
            border-color: #1a1a2e;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(26,26,46,0.25);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* ── Responsive ── */
        @media (max-width: 650px) {
            .login-card {
                flex-direction: column;
                max-width: 420px;
                min-height: unset;
            }
            .left-panel {
                padding: 28px 28px 24px;
                min-height: 200px;
            }
            .left-main h1 { font-size: 28px; }
            .left-footer { display: none; }
            .right-panel { padding: 36px 28px; }
        }
    </style>
</head>
<body>

<div class="login-card">

    {{-- ── LEFT PANEL ── --}}
    <div class="left-panel">
        {{-- Brand badge --}}
        <div class="brand-badge">
            <div class="icon">
                {{-- Mortarboard icon --}}
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                </svg>
            </div>
            Pusat Kegiatan Belajar Masyarakat
        </div>

        {{-- Main text --}}
        <div class="left-main">
            <h1>E-RAPOR PKBM</h1>
            <p>
                Pusat pendidikan non-formal untuk meningkatkan pengetahuan
                dan keterampilan masyarakat.
            </p>
        </div>

        {{-- Footer --}}
        <div class="left-footer">
            <p>Jika ada kendala silahkan hubungi nomor dibawah ini</p>
            <p>08XX-XXXX-XXXX</p>
        </div>
    </div>

    {{-- ── RIGHT PANEL ── --}}
    <div class="right-panel">
        <form id="login-form" method="POST" action="{{ route('login.post') }}">
            @csrf

            {{-- Error alert --}}
            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Username --}}
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    required
                >
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login" id="btn-login">LOGIN</button>
        </form>
    </div>

</div>

</body>
</html>
