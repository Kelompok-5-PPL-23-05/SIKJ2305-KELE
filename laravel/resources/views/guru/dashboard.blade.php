<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | E-RAPOR PKBM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #dce6f5;
            min-height: 100vh;
            display: flex;
        }

        /* ══ SIDEBAR ══ */
        .sidebar {
            width: 210px;
            min-width: 210px;
            background: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            box-shadow: 2px 0 12px rgba(0,0,0,0.07);
            position: relative;
            transition: width 0.25s ease;
            z-index: 10;
        }

        .sidebar.collapsed { width: 0; min-width: 0; overflow: hidden; }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 16px 14px;
            border-bottom: 1px solid #eef0f5;
        }

        .hamburger {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .hamburger span {
            display: block;
            width: 20px;
            height: 2px;
            background: #1a1a2e;
            border-radius: 2px;
            transition: all 0.2s;
        }

        .sidebar-title {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
        }

        /* Search */
        .sidebar-search {
            padding: 12px 12px 8px;
        }
        .search-wrap {
            display: flex;
            align-items: center;
            background: #f4f6fb;
            border-radius: 20px;
            padding: 6px 12px;
            gap: 6px;
        }
        .search-wrap input {
            border: none;
            background: transparent;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            color: #1a1a2e;
            outline: none;
            width: 100%;
        }
        .search-wrap svg { flex-shrink: 0; }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 4px 0 12px;
        }

        .nav-section { margin-bottom: 2px; }

        .nav-group-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
            color: #1a1a2e;
            cursor: pointer;
            user-select: none;
            transition: background 0.15s;
        }
        .nav-group-toggle:hover { background: #f4f6fb; }

        .nav-group-toggle .arrow {
            font-size: 10px;
            color: #666;
            transition: transform 0.2s;
        }
        .nav-group-toggle.open .arrow { transform: rotate(90deg); }

        .nav-children {
            display: none;
            flex-direction: column;
        }
        .nav-children.open { display: flex; }

        .nav-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 16px 8px 24px;
            font-size: 13px;
            color: #3a4a6a;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
            border-radius: 0;
        }
        .nav-item:hover { background: #f0f4ff; color: #1a1a2e; }
        .nav-item.active {
            background: #e8eef9;
            color: #1a1a2e;
            font-weight: 600;
            border-right: 3px solid #8fa3c3;
        }
        .nav-item .chevron { font-size: 10px; color: #999; }

        /* Sub-children (Paket A Kelas 1, dst) */
        .nav-sub { display: none; flex-direction: column; }
        .nav-sub.open { display: flex; }
        .nav-sub-item {
            padding: 6px 16px 6px 36px;
            font-size: 12.5px;
            color: #555;
            cursor: pointer;
            text-decoration: none;
            display: block;
            transition: background 0.15s;
        }
        .nav-sub-item:hover { background: #edf1fb; color: #1a1a2e; }

        .nav-link {
            display: block;
            padding: 9px 16px;
            font-size: 13px;
            color: #3a4a6a;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }
        .nav-link:hover { background: #f0f4ff; color: #1a1a2e; }
        .nav-link.active { background: #e8eef9; font-weight: 600; color: #1a1a2e; border-right: 3px solid #8fa3c3; }

        /* Logout */
        .sidebar-footer {
            padding: 12px 16px;
            border-top: 1px solid #eef0f5;
        }
        .btn-logout {
            display: block;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            color: #c0392b;
            font-weight: 600;
            cursor: pointer;
            padding: 8px 0;
            transition: color 0.15s;
        }
        .btn-logout:hover { color: #96281b; }

        /* ══ MAIN CONTENT ══ */
        .main {
            flex: 1;
            padding: 32px 36px;
            overflow-y: auto;
        }

        /* Selectors */
        .selectors {
            display: flex;
            gap: 40px;
            margin-bottom: 28px;
            align-items: flex-end;
        }
        .selector-group label {
            display: block;
            font-size: 15px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 8px;
        }
        .selector-group select {
            appearance: none;
            -webkit-appearance: none;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23666' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat right 12px center;
            border: 1.5px solid #d0d8e8;
            border-radius: 8px;
            padding: 10px 36px 10px 14px;
            font-size: 13.5px;
            font-family: 'Inter', sans-serif;
            color: #1a1a2e;
            cursor: pointer;
            min-width: 180px;
            outline: none;
            transition: border-color 0.2s;
        }
        .selector-group select:focus { border-color: #8fa3c3; }

        /* Student card */
        .student-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .student-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        .student-avatar {
            width: 36px;
            height: 36px;
            background: #dce6f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .student-avatar svg { width: 20px; height: 20px; fill: #8fa3c3; }
        .student-name {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a2e;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .student-fields {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 16px;
        }
        .field-group label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 6px;
        }
        .field-group label span { color: #e74c3c; margin-left: 2px; }
        .field-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid #d0d8e8;
            border-radius: 8px;
            font-size: 13.5px;
            font-family: 'Inter', sans-serif;
            color: #1a1a2e;
            outline: none;
            transition: border-color 0.2s;
            background: #fff;
        }
        .field-group input:focus { border-color: #8fa3c3; }
        .field-group input::placeholder { color: #b0b8c8; }

        /* Submit btn */
        .form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }
        .btn-submit {
            padding: 11px 32px;
            background: #fff;
            border: 1.5px solid #c8d3e8;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            color: #1a1a2e;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        }
        .btn-submit:hover {
            background: #1a1a2e;
            color: #fff;
            border-color: #1a1a2e;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(26,26,46,0.18);
        }

        /* Success toast */
        .toast {
            display: none;
            position: fixed;
            top: 24px;
            right: 24px;
            background: #27ae60;
            color: #fff;
            padding: 14px 22px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            z-index: 999;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }
    </style>
</head>
<body>

<!-- ══ SIDEBAR ══ -->
<aside class="sidebar" id="sidebar">

    <div class="sidebar-header">
        <button class="hamburger" id="hamburger-btn" title="Toggle Sidebar">
            <span></span><span></span><span></span>
        </button>
        <span class="sidebar-title">E-Rapor</span>
    </div>

    <div class="sidebar-search">
        <div class="search-wrap">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2.2" stroke-linecap="round">
                <circle cx="11" cy="11" r="7"/><line x1="16.5" y1="16.5" x2="21" y2="21"/>
            </svg>
            <input type="text" placeholder="Cari" id="search-input">
        </div>
    </div>

    <nav class="sidebar-nav">

        {{-- Akun Pengguna --}}
        <div class="nav-section">
            <div class="nav-group-toggle open" onclick="toggleGroup(this)">
                <span>Akun Pengguna</span>
                <span class="arrow">›</span>
            </div>
            <div class="nav-children open">
                <a href="#" class="nav-item">Informasi Pengguna</a>
                <a href="#" class="nav-item">Ubah Kata Sandi</a>
            </div>
        </div>

        {{-- Kelas --}}
        <div class="nav-section">
            <div class="nav-group-toggle open" onclick="toggleGroup(this)">
                <span>Kelas</span>
                <span class="arrow">›</span>
            </div>
            <div class="nav-children open">
                <div class="nav-item" onclick="toggleSub(this)">Paket A <span class="chevron">‹</span></div>
                <div class="nav-sub">
                    <a href="#" class="nav-sub-item">Kelas 1</a>
                    <a href="#" class="nav-sub-item">Kelas 2</a>
                    <a href="#" class="nav-sub-item">Kelas 3</a>
                </div>
                <div class="nav-item" onclick="toggleSub(this)">Paket B <span class="chevron">‹</span></div>
                <div class="nav-sub">
                    <a href="#" class="nav-sub-item">Kelas 1</a>
                    <a href="#" class="nav-sub-item">Kelas 2</a>
                    <a href="#" class="nav-sub-item">Kelas 3</a>
                </div>
                <div class="nav-item" onclick="toggleSub(this)">Paket C <span class="chevron">‹</span></div>
                <div class="nav-sub">
                    <a href="#" class="nav-sub-item">Kelas 1</a>
                    <a href="#" class="nav-sub-item">Kelas 2</a>
                    <a href="#" class="nav-sub-item">Kelas 3</a>
                </div>
            </div>
        </div>

        {{-- Mata Pelajaran --}}
        <div class="nav-section">
            <div class="nav-group-toggle open" onclick="toggleGroup(this)">
                <span>Mata Pelajaran</span>
                <span class="arrow">›</span>
            </div>
            <div class="nav-children open">
                <a href="#" class="nav-item">Bahasa Indonesia</a>
                <a href="#" class="nav-item">Bahasa Inggris</a>
            </div>
        </div>

        {{-- Single links --}}
        <a href="#" class="nav-link active">Masukkan Nilai</a>
        <div class="nav-section">
            <div class="nav-group-toggle" onclick="toggleGroup(this)">
                <span>Rapor Siswa</span>
                <span class="arrow">›</span>
            </div>
            <div class="nav-children">
                <a href="#" class="nav-item">Lihat Rapor</a>
            </div>
        </div>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">Keluar</button>
        </form>
    </div>
</aside>

<!-- ══ MAIN CONTENT ══ -->
<main class="main">
    <!-- Dropdowns -->
    <div class="selectors">
        <div class="selector-group">
            <label>Pilih Kelas</label>
            <select id="sel-kelas">
                <option>Paket A Kelas 3</option>
                <option>Paket A Kelas 1</option>
                <option>Paket A Kelas 2</option>
                <option>Paket B Kelas 1</option>
                <option>Paket B Kelas 2</option>
                <option>Paket B Kelas 3</option>
                <option>Paket C Kelas 1</option>
                <option>Paket C Kelas 2</option>
                <option>Paket C Kelas 3</option>
            </select>
        </div>
        <div class="selector-group">
            <label>Pilih Mata Pelajaran</label>
            <select id="sel-mapel">
                <option>Bahasa Indonesia</option>
                <option>Bahasa Inggris</option>
                <option>Matematika</option>
                <option>IPA</option>
                <option>IPS</option>
            </select>
        </div>
    </div>

    <!-- Students form -->
    <form id="nilai-form" onsubmit="submitNilai(event)">
        @csrf
        <div id="students-container">
            <!-- Student cards dirender JS -->
        </div>
        <div class="form-footer">
            <button type="submit" class="btn-submit">Submit</button>
        </div>
    </form>
</main>

<!-- Toast notification -->
<div class="toast" id="toast">✓ Nilai berhasil disimpan!</div>

<script>
    /* ── Sidebar toggle ── */
    document.getElementById('hamburger-btn').addEventListener('click', () => {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });

    /* ── Nav group toggle ── */
    function toggleGroup(el) {
        el.classList.toggle('open');
        const children = el.nextElementSibling;
        children.classList.toggle('open');
    }

    /* ── Sub-menu toggle (Paket A/B/C) ── */
    function toggleSub(el) {
        const sub = el.nextElementSibling;
        if (!sub) return;
        const chevron = el.querySelector('.chevron');
        const isOpen = sub.classList.toggle('open');
        if (chevron) chevron.style.transform = isOpen ? 'rotate(-90deg)' : '';
    }

    /* ── Demo students ── */
    const students = [
        { id: 1, name: 'Nama Siswa 1' },
        { id: 2, name: 'Nama Siswa 2' },
        { id: 3, name: 'Nama Siswa 3' },
    ];

    function renderStudents() {
        const container = document.getElementById('students-container');
        container.innerHTML = students.map(s => `
            <div class="student-card">
                <div class="student-header">
                    <div class="student-avatar">
                        <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                    </div>
                    <span class="student-name">${s.name}</span>
                </div>
                <div class="student-fields">
                    <div class="field-group">
                        <label>Masukkan nilai <span>*</span></label>
                        <input type="number" min="1" max="100" placeholder="1 – 100" name="nilai_${s.id}" required>
                    </div>
                    <div class="field-group">
                        <label>Catatan</label>
                        <input type="text" placeholder="Catatan untuk siswa" name="catatan_${s.id}">
                    </div>
                </div>
            </div>
        `).join('');
    }

    renderStudents();

    /* ── Submit ── */
    function submitNilai(e) {
        e.preventDefault();
        const toast = document.getElementById('toast');
        toast.style.display = 'block';
        setTimeout(() => toast.style.display = 'none', 3000);
    }

    /* ── Search filter (simple) ── */
    document.getElementById('search-input').addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('.nav-link, .nav-item, .nav-sub-item').forEach(el => {
            el.style.display = !q || el.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
</script>

</body>
</html>
