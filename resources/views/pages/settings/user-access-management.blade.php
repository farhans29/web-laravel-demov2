<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-3xl font-semibold">Menu Access Management</h2>
            <div class="flex gap-x-4">
                <!-- Select User -->
                <select id="userSelect" class="border border-gray-300 rounded-md text-lg px-4 py-2 w-64">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <!-- Select Main Menu -->
                <select id="mainMenuSelect" class="border border-gray-300 rounded-md text-lg px-4 py-2 w-64">
                    <option value="">Select Main Menu</option>
                    @foreach ($sidebarItems->whereNull('parent_id')->whereNull('route') as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-8">
            <div class="flex items-center justify-between px-6 py-4 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900">Permissions</h3>
                <button id="updateAccess" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Access</button>
            </div>

            <div id="permissionsContainer" class="px-6 py-4 hidden">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-300 mt-4">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="border border-gray-300 px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase w-1/12">
                                Main Menu
                            </th>
                            <th
                                class="border border-gray-300 px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase w-1/12">
                                Sub Menu
                            </th>
                            <th
                                class="border border-gray-300 px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase w-1/12">
                                List Menu
                            </th>
                            <th
                                class="border border-gray-300 px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase w-1/3">
                                Granted
                            </th>
                        </tr>
                    </thead>
                    <tbody id="permissionsTableBody">
                        @foreach ($sidebarItems as $item)
                            <tr class="odd:bg-gray-100 menu-item" data-main-menu="{{ $item->parent_id ?? $item->id }}">
                                <td class="border border-gray-300 px-2 py-2 text-sm text-gray-900 w-1/12">
                                    @if (is_null($item->route) && is_null($item->parent_id))
                                        {{ $item->name }} <!-- Main Menu -->
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-2 py-2 text-sm text-gray-900 w-1/12">
                                    @if (is_null($item->route) && !is_null($item->parent_id))
                                        {{ $item->name }} <!-- Sub Menu -->
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-2 py-2 text-sm text-gray-900 w-1/12">
                                    @if (!is_null($item->route) && !is_null($item->parent_id))
                                        {{ $item->name }} <!-- List Menu -->
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-900 text-center w-1/3">
                                    <input type="checkbox" class="form-checkbox" value="{{ $item->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('userSelect').addEventListener('change', function() {
            const userId = this.value;
            const permissionsContainer = document.getElementById('permissionsContainer');

            if (userId) {
                // Fetch user permissions via AJAX
                fetch(`/user-access/${userId}/permissions`)
                    .then(response => response.json())
                    .then(data => {
                        permissionsContainer.classList.remove('hidden');

                        // Check the appropriate permissions
                        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                            checkbox.checked = data.permissions.includes(parseInt(checkbox.value));
                        });
                    });
            } else {
                permissionsContainer.classList.add('hidden');
            }
        });

        document.getElementById('updateAccess').addEventListener('click', function() {
            const userId = document.getElementById('userSelect').value;
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const selectedPermissions = [];

            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedPermissions.push(checkbox.value);
                }
            });

            fetch(`/user-access/${userId}/update`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        permissions: selectedPermissions
                    })
                })
                .then(response => response.json())
                .then(data => {

                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "bottom",
                        position: "left",
                        backgroundColor: "#4CAF50",
                        stopOnFocus: true,
                    }).showToast();


                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    Toastify({
                        text: "Gagal memperbarui akses!",
                        duration: 3000,
                        close: true,
                        gravity: "bottom",
                        position: "left",
                        backgroundColor: "#FF5733",
                    }).showToast();
                });
        });

        document.getElementById('mainMenuSelect').addEventListener('change', function() {
            const selectedMainMenu = this.value.toLowerCase(); // Ambil nilai dan ubah ke lowercase

            document.querySelectorAll('.menu-item').forEach(row => {
                const menuGroup = row.getAttribute('data-main-menu');
                const menuCategory = row.getAttribute('data-category') ? row.getAttribute('data-category')
                    .toLowerCase() : '';

                if (selectedMainMenu === "" || menuGroup === selectedMainMenu || menuCategory.includes(
                        selectedMainMenu)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const menuId = this.value;
                const isChecked = this.checked;

                // Jika checkbox adalah main menu, update semua turunannya
                document.querySelectorAll(`.menu-item[data-main-menu='${menuId}'] input[type="checkbox"]`)
                    .forEach(childCheckbox => {
                        childCheckbox.checked = isChecked;
                    });

                // Jika checkbox adalah sub menu atau list menu, periksa apakah semua turunannya uncheck
                if (!isChecked) {
                    document.querySelectorAll('.menu-item').forEach(row => {
                        const mainMenuId = row.getAttribute('data-main-menu');
                        if (mainMenuId) {
                            const mainMenuCheckbox = document.querySelector(
                                `input[type="checkbox"][value='${mainMenuId}']`);
                            if (mainMenuCheckbox) {
                                const allUnchecked = document.querySelectorAll(
                                    `.menu-item[data-main-menu='${mainMenuId}'] input[type="checkbox"]:checked`
                                    ).length === 0;
                                mainMenuCheckbox.checked = !allUnchecked;
                            }
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
