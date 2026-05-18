@extends('layout.public')
@section('content')

<style>
    .kurikulum-title-container {
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 20px;
        position: relative;
    }
    .kurikulum-title {
        color: #004a8c;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
        display: inline-block;
        padding-bottom: 5px;
    }
    .kurikulum-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 150px;
        height: 2px;
        background-color: #f2a900;
    }
    .accordion-header {
        background-color: #f8f9fa;
        padding: 12px 15px;
        border: 1px solid #e9ecef;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
        border-radius: 2px;
    }
    
    /* Tabs Styles */
    .tabs {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 20px;
    }
    .tab-button {
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
        border-bottom: none;
        padding: 10px 20px;
        cursor: pointer;
        font-weight: bold;
        color: #555;
        margin-right: 5px;
        border-radius: 4px 4px 0 0;
        transition: all 0.3s;
    }
    .tab-button:hover {
        background-color: #e9ecef;
    }
    .tab-button.active {
        background-color: #fff;
        color: #004a8c;
        border-top: 3px solid #f2a900;
        border-bottom: 2px solid #fff;
        margin-bottom: -2px;
    }
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: block;
    }
    
    /* Kurikulum Tabs Styles */
    .kurikulum-tabs {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 2px solid #f2a900;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .kurikulum-tab-button {
        background-color: transparent;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-weight: bold;
        color: #777;
        font-size: 18px;
        transition: all 0.3s;
        margin-right: 15px;
        position: relative;
    }
    .kurikulum-tab-button:hover {
        color: #004a8c;
    }
    .kurikulum-tab-button.active {
        color: #004a8c;
    }
    .kurikulum-tab-button.active::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 3px;
        background-color: #f2a900;
    }
    .kurikulum-tab-content {
        display: none;
    }
    .kurikulum-tab-content.active {
        display: block;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0 40px;
    }
    .semester-title {
        text-align: center;
        font-weight: bold;
        font-size: 13px;
        margin-bottom: 8px;
        margin-top: 10px;
        color: #333;
    }
    .mk-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
        margin-bottom: 20px;
        color: #333;
    }
    .mk-table th {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        text-align: left;
        padding: 8px 4px;
        font-weight: bold;
    }
    .mk-table th.center {
        text-align: center;
    }
    .mk-table td {
        padding: 8px 4px;
        border-bottom: 1px solid #eee;
        vertical-align: top;
    }
    .mk-table td.center {
        text-align: center;
    }
    .mk-table tr.total-row td {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        font-weight: bold;
    }
    .mk-link {
        text-decoration: none;
        color: #004a8c;
    }
    .mk-link:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: 1fr;
        }
    }

    #rpsSearch:focus {
        border-color: #004a8c !important;
        box-shadow: 0 0 0 3px rgba(0, 74, 140, 0.1) !important;
    }

    /* Dark Mode Overrides for RPS Page */
    body.dark-mode .accordion-header {
        background-color: #2c2c2c;
        border: 1px solid #444;
        color: #e0e0e0;
    }
    body.dark-mode .tabs {
        border-bottom: 2px solid #444;
    }
    body.dark-mode .tab-button {
        background-color: #2c2c2c;
        border: 1px solid #444;
        color: #aaa;
    }
    body.dark-mode .tab-button:hover {
        background-color: #3a3a3a;
    }
    body.dark-mode .tab-button.active {
        background-color: #1e1e1e;
        color: #4da3ff;
        border-top: 3px solid #f2a900;
        border-bottom: 2px solid #1e1e1e;
    }
    body.dark-mode .kurikulum-tab-button {
        color: #aaa;
    }
    body.dark-mode .kurikulum-tab-button:hover,
    body.dark-mode .kurikulum-tab-button.active {
        color: #4da3ff;
    }
    body.dark-mode .semester-title {
        color: #e0e0e0;
    }
    body.dark-mode .mk-table {
        color: #e0e0e0;
    }
    body.dark-mode .mk-table th {
        border-top: 1px solid #444;
        border-bottom: 1px solid #444;
    }
    body.dark-mode .mk-table td {
        border-bottom: 1px solid #333;
    }
    body.dark-mode .mk-table tr.total-row td {
        border-top: 1px solid #444;
        border-bottom: 1px solid #444;
    }
    body.dark-mode .mk-link {
        color: #4da3ff;
    }
    body.dark-mode #rpsSearch {
        background-color: #2c2c2c;
        border: 1px solid #444 !important;
        color: #fff;
    }
    body.dark-mode #rpsSearch::placeholder {
        color: #aaa;
    }
    body.dark-mode #rpsSearch:focus {
        border-color: #f2a900 !important;
        box-shadow: 0 0 0 3px rgba(242, 169, 0, 0.2) !important;
    }
    body.dark-mode .no-search-results {
        background-color: #2c2c2c !important;
        color: #ccc !important;
    }
</style>

<!-- Search Box -->
<div class="search-container" style="margin-bottom: 25px;">
    <div style="position: relative; max-width: 400px;">
        <input type="text" id="rpsSearch" placeholder="Cari Kode atau Mata Kuliah..." 
               style="width: 100%; padding: 12px 15px 12px 45px; border: 1px solid #e0e0e0; border-radius: 6px; font-size: 14px; outline: none; transition: all 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <i class="fas fa-search" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #888;"></i>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="tabs">
    @php $first = true; @endphp
    @foreach($prodiData as $prodiName => $kurikulumGroups)
        <button class="tab-button {{ $first ? 'active' : '' }}" onclick="openTab(event, 'tab-{{ Str::slug($prodiName) }}')">
            {{ strtoupper($prodiName) }}
        </button>
        @php $first = false; @endphp
    @endforeach
</div>

<!-- Tabs Content -->
@php $firstContent = true; @endphp
@foreach($prodiData as $prodiName => $kurikulumGroups)
<div id="tab-{{ Str::slug($prodiName) }}" class="tab-content {{ $firstContent ? 'active' : '' }}">
    
    @if(empty($kurikulumGroups))
        <p style="text-align: center; color: #777; margin-top: 20px;">Belum ada data mata kuliah untuk prodi ini.</p>
    @else
        <!-- Kurikulum Tabs Navigation -->
        <div class="kurikulum-tabs">
            @php $firstKurikTab = true; @endphp
            @foreach($kurikulumGroups as $kurikulumName => $jenisGroups)
                <button class="kurikulum-tab-button {{ $firstKurikTab ? 'active' : '' }}" onclick="openKurikulumTab(event, 'kurik-{{ Str::slug($prodiName) }}-{{ Str::slug($kurikulumName) }}', '{{ Str::slug($prodiName) }}')">
                    Kurikulum {{ $kurikulumName }}
                </button>
                @php $firstKurikTab = false; @endphp
            @endforeach
        </div>

        <!-- Kurikulum Tabs Content -->
        @php $firstKurikContent = true; @endphp
        @foreach($kurikulumGroups as $kurikulumName => $jenisGroups)
            <div id="kurik-{{ Str::slug($prodiName) }}-{{ Str::slug($kurikulumName) }}" class="kurikulum-tab-content kurik-content-{{ Str::slug($prodiName) }} {{ $firstKurikContent ? 'active' : '' }}">
            
            <div class="accordion-header">
                &minus; Mata Kuliah Wajib
            </div>

            <!-- MATA KULIAH WAJIB -->
            <div class="grid-container">
                @if(isset($jenisGroups['wajib']) && !empty($jenisGroups['wajib']))
                    @foreach($jenisGroups['wajib'] as $semesterName => $semesterData)
                        <div>
                            <div class="semester-title">{{ strtoupper($semesterName) }}</div>
                            <table class="mk-table">
                                <thead>
                                    <tr>
                                        <th width="20%">Kode</th>
                                        <th>Mata kuliah</th>
                                        <th width="15%" class="center">SKS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalSks = 0; @endphp
                                    @foreach($semesterData as $d)
                                    <tr>
                                        <td>{{ $d->kode_mk }}</td>
                                        <td>
                                            @if($d->link_rps)
                                                <a href="{{ $d->link_rps }}" target="_blank" class="mk-link">{{ $d->nama_mk }}</a>
                                            @else
                                                {{ $d->nama_mk }}
                                            @endif
                                        </td>
                                        <td class="center">{{ $d->sks }}</td>
                                    </tr>
                                    @php $totalSks += (int) $d->sks; @endphp
                                    @endforeach
                                    <tr class="total-row">
                                        <td colspan="2">Total</td>
                                        <td class="center">{{ $totalSks }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @else
                    <p style="color: #777; margin-bottom: 20px;">Belum ada data mata kuliah wajib.</p>
                @endif
            </div>

            <!-- MATA KULIAH PEMINATAN -->
            @if(isset($jenisGroups['peminatan']) && count($jenisGroups['peminatan']) > 0)
            <div class="accordion-header" style="margin-top: 20px;">
                &minus; Mata Kuliah Wajib Peminatan
            </div>
            <table class="mk-table" style="max-width: 50%;">
                <thead>
                    <tr>
                        <th width="20%">Kode</th>
                        <th>Mata kuliah</th>
                        <th width="15%" class="center">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalSksPeminatan = 0; @endphp
                    @foreach($jenisGroups['peminatan'] as $d)
                    <tr>
                        <td>{{ $d->kode_mk }}</td>
                        <td>
                            @if($d->link_rps)
                                <a href="{{ $d->link_rps }}" target="_blank" class="mk-link">{{ $d->nama_mk }}</a>
                            @else
                                {{ $d->nama_mk }}
                            @endif
                        </td>
                        <td class="center">{{ $d->sks }}</td>
                    </tr>
                    @php $totalSksPeminatan += (int) $d->sks; @endphp
                    @endforeach
                    <tr class="total-row">
                        <td colspan="2">Total</td>
                        <td class="center">{{ $totalSksPeminatan }}</td>
                    </tr>
                </tbody>
            </table>
            @endif
            
            </div> <!-- End Kurikulum Tab Content -->
            @php $firstKurikContent = false; @endphp
        @endforeach
    @endif
</div>
@php $firstContent = false; @endphp
@endforeach

<script>
function openTab(evt, tabId, skipSearch = false) {
    // Hide all tab contents
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }

    // Remove active class from all tab buttons
    tablinks = document.getElementsByClassName("tab-button");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Show the current tab and add an "active" class to the button
    document.getElementById(tabId).classList.add("active");
    if (evt) {
        evt.currentTarget.classList.add("active");
    } else {
        var btn = document.querySelector(`.tabs button[onclick*="'${tabId}'"]`);
        if (btn) btn.classList.add("active");
    }
    
    if (!skipSearch) {
        const searchInput = document.getElementById('rpsSearch');
        if (searchInput && searchInput.value) {
            filterRps(searchInput.value);
        }
    }
}

function openKurikulumTab(evt, tabId, prodiSlug, skipSearch = false) {
    var i, tabcontent, tablinks;
    
    // Hide all kurikulum tab contents inside THIS prodi tab
    tabcontent = document.getElementsByClassName("kurik-content-" + prodiSlug);
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }

    // Remove active class from all kurikulum tab buttons inside THIS prodi tab
    var currentTab = document.getElementById("tab-" + prodiSlug);
    if (currentTab) {
        var tabsContainer = currentTab.querySelector('.kurikulum-tabs');
        if (tabsContainer) {
            tablinks = tabsContainer.getElementsByClassName("kurikulum-tab-button");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
        }
    }

    // Show the current kurikulum tab and add "active" to the button
    document.getElementById(tabId).classList.add("active");
    if (evt) {
        evt.currentTarget.classList.add("active");
    } else {
        var btn = document.querySelector(`button[onclick*="'${tabId}'"]`);
        if (btn) btn.classList.add("active");
    }
    
    if (!skipSearch) {
        const searchInput = document.getElementById('rpsSearch');
        if (searchInput && searchInput.value) {
            filterRps(searchInput.value);
        }
    }
}

// Search Functionality
document.getElementById('rpsSearch').addEventListener('input', function() {
    filterRps(this.value);
});

function filterRps(query) {
    query = query.toLowerCase();
    const tabContents = document.querySelectorAll('.tab-content');
    const isSearching = query.length > 0;
    
    let firstMatchingProdiTabId = null;
    let activeProdiTabHasMatch = false;
    
    tabContents.forEach(tab => {
        let tabHasAnyMatch = false;
        const prodiSlug = tab.id.replace('tab-', '');
        
        // 1. Process Kurikulum Tabs
        const kurikulumContents = tab.querySelectorAll('.kurikulum-tab-content');
        let firstMatchingKurikulumTabId = null;
        let activeKurikulumTabHasMatch = false;

        kurikulumContents.forEach(kurikTab => {
            let kurikHasAnyMatch = false;
            
            // Filter rows in all tables
            const tables = kurikTab.querySelectorAll('.mk-table');
            tables.forEach(table => {
                const rows = table.querySelectorAll('tbody tr:not(.total-row)');
                const totalRow = table.querySelector('.total-row');
                let tableHasMatch = false;
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(query)) {
                        row.style.display = '';
                        tableHasMatch = true;
                        kurikHasAnyMatch = true;
                        tabHasAnyMatch = true;
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                // Hide/Show table and its total row
                if (tableHasMatch) {
                    table.style.display = '';
                    if (totalRow) totalRow.style.display = isSearching ? 'none' : '';
                } else {
                    table.style.display = 'none';
                }
                
                // Hide/Show semester wrapper div
                if (table.parentElement && table.parentElement.parentElement && table.parentElement.parentElement.classList.contains('grid-container')) {
                    table.parentElement.style.display = tableHasMatch ? '' : 'none';
                }
            });
            
            // Hide/Show Grid Containers and their Headers
            const gridContainers = kurikTab.querySelectorAll('.grid-container');
            gridContainers.forEach(grid => {
                let gridHasMatch = false;
                const childDivs = grid.children;
                for (let i = 0; i < childDivs.length; i++) {
                    if (childDivs[i].style.display !== 'none') {
                        gridHasMatch = true;
                        break;
                    }
                }
                
                grid.style.display = gridHasMatch ? '' : 'none';
                
                let prev = grid.previousElementSibling;
                while (prev && !prev.classList.contains('accordion-header')) {
                    prev = prev.previousElementSibling;
                }
                if (prev) prev.style.display = gridHasMatch ? '' : 'none';
            });
            
            // Handle Peminatan tables which are not in grid
            const peminatanTables = kurikTab.querySelectorAll('.mk-table');
            peminatanTables.forEach(table => {
                if (!table.closest('.grid-container')) {
                    let prev = table.previousElementSibling;
                    while (prev && !prev.classList.contains('accordion-header')) {
                        prev = prev.previousElementSibling;
                    }
                    if (prev) prev.style.display = (table.style.display !== 'none') ? '' : 'none';
                }
            });

            // Kurikulum Tab Button Visibility
            const kurikTabId = kurikTab.id;
            const kurikBtn = tab.querySelector(`button[onclick*="'${kurikTabId}'"]`);
            if (kurikBtn) {
                if (isSearching) {
                    kurikBtn.style.display = kurikHasAnyMatch ? '' : 'none';
                } else {
                    kurikBtn.style.display = '';
                }
            }

            if (kurikHasAnyMatch) {
                if (!firstMatchingKurikulumTabId) firstMatchingKurikulumTabId = kurikTabId;
                if (kurikTab.classList.contains('active')) activeKurikulumTabHasMatch = true;
            }
        }); // end kurikulum contents

        // Auto-switch Kurikulum Tab if searching and active has no match
        if (isSearching && !activeKurikulumTabHasMatch && firstMatchingKurikulumTabId) {
            openKurikulumTab(null, firstMatchingKurikulumTabId, prodiSlug, true);
        }

        // Prodi Tab Button Visibility
        const tabId = tab.id;
        const prodiBtn = document.querySelector(`.tabs button[onclick*="'${tabId}'"]`);
        if (prodiBtn) {
            if (isSearching) {
                prodiBtn.style.display = tabHasAnyMatch ? '' : 'none';
            } else {
                prodiBtn.style.display = '';
            }
        }

        if (tabHasAnyMatch) {
            if (!firstMatchingProdiTabId) firstMatchingProdiTabId = tabId;
            if (tab.classList.contains('active')) activeProdiTabHasMatch = true;
        }

        // Handle "No Results" message within tab
        let noResultsMsg = tab.querySelector('.no-search-results');
        if (!tabHasAnyMatch && isSearching) {
            if (!noResultsMsg) {
                noResultsMsg = document.createElement('div');
                noResultsMsg.className = 'no-search-results';
                noResultsMsg.style.textAlign = 'center';
                noResultsMsg.style.color = '#777';
                noResultsMsg.style.marginTop = '30px';
                noResultsMsg.style.padding = '20px';
                noResultsMsg.style.background = '#f9f9f9';
                noResultsMsg.style.borderRadius = '8px';
                noResultsMsg.innerHTML = '<i class="fas fa-search" style="margin-right: 10px;"></i> Tidak ada mata kuliah yang cocok dengan pencarian Anda.';
                tab.appendChild(noResultsMsg);
            }
            noResultsMsg.style.display = '';
            // Hide kurikulum tabs container if no match
            const kt = tab.querySelector('.kurikulum-tabs');
            if(kt) kt.style.display = 'none';
        } else {
            if (noResultsMsg) noResultsMsg.style.display = 'none';
            // Show kurikulum tabs container
            const kt = tab.querySelector('.kurikulum-tabs');
            if(kt) kt.style.display = '';
        }
    });

    // Auto-switch Prodi Tab if searching and active has no match
    if (isSearching && !activeProdiTabHasMatch && firstMatchingProdiTabId) {
        openTab(null, firstMatchingProdiTabId, true);
    }
}
</script>

@endsection