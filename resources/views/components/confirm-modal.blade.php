@props(['name', 'show' => false, 'maxWidth' => 'md'])

@php
    $maxWidthClass = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div
    x-data="modalComponent('{{ $name }}', @js($show))"
    x-init="init()"
    x-on:open-modal.window="handleOpen($event)"
    x-on:close-modal.window="handleClose($event)"
    class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0 flex items-center justify-center"
    :style="show ? 'display: flex' : 'display: none'"
>
    <!-- Background overlay -->
    <div x-show="show"
         x-transition.opacity
         class="fixed inset-0 bg-black bg-opacity-50"
         @click="close()"
    ></div>

    <!-- Modal box -->
    <div x-show="show"
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all 
                w-full sm:w-auto {{ $maxWidth }} 
                p-6 whitespace-normal break-words"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{ $slot }}
    </div>


</div>

<script>
    function modalComponent(name, initialShow = false) {
        return {
            show: initialShow,
            name: name,
            lastFocused: null,
            
            init() {
                // Focus-trap setup
                this.$watch('show', value => {
                    if (value) {
                        this.openFocusTrap();
                    } else {
                        this.closeFocusTrap();
                    }
                });
            },

            handleOpen(event) {
                if (event.detail === this.name) {
                    this.show = true;
                }
            },

            handleClose(event) {
                if (event.detail === this.name) {
                    this.show = false;
                }
            },

            openFocusTrap() {
                this.lastFocused = document.activeElement;

                // Wait sedikit agar modal siap
                setTimeout(() => {
                    this.$refs.dialog.focus();
                }, 50);
            },

            closeFocusTrap() {
                if (this.lastFocused) {
                    this.lastFocused.focus();
                }
            },

            close() {
                this.show = false;
            }
        }
    }
</script>
