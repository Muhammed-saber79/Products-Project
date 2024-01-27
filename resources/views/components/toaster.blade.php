@if ($errors->any())
    <div id="toasterContainer" @if ( isset($style) ) style="{{ $style }}" @else style="position: fixed; top: 110px; left: 50px; width: 300px;" @endif>

        @foreach ($errors->all() as $error)
        <div class="toaster" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); opacity: 0; transition: opacity 0.5s ease-in-out, margin 0.5s ease-in-out; margin-bottom: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>{{ $error }}</span>
                <button style="background: none; border: none; color: inherit; cursor: pointer; font-size: larger;" onclick="closeToaster(this.parentElement)">×</button>
            </div>
        </div>
        @endforeach

    </div>
@endif

<div id="toasterContainer" @if ( isset($style) ) style="{{ $style }}" @else style="position: fixed; top: 110px; left: 50px; width: 300px;" @endif>

    @if (Session::has('success'))
        <div class="toaster" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); opacity: 0; transition: opacity 0.5s ease-in-out, margin 0.5s ease-in-out; margin-bottom: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>{{ Session::get('success') }}</span>
                <button style="background: none; border: none; color: inherit; cursor: pointer; font-size: larger;" onclick="closeToaster(this.parentElement)">×</button>
            </div>
        </div>
    @endif

    @if (Session::has('info'))
        <div class="toaster" style="background-color: #cce5ff; color: #004085; padding: 10px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); opacity: 0; transition: opacity 0.5s ease-in-out, margin 0.5s ease-in-out; margin-bottom: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>{{ Session::get('info') }}</span>
                <button style="background: none; border: none; color: inherit; cursor: pointer; font-size: larger;" onclick="closeToaster(this.parentElement)">×</button>
            </div>
        </div>
    @endif

    @if (Session::has('danger') || Session::has('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); opacity: 0; transition: opacity 0.5s ease-in-out, margin 0.5s ease-in-out; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;" class="toaster">
            <div>
                {{ Session::has('danger') ? Session::get('danger') : Session::get('error') }}
            </div>
            <button style="background: none; border: none; color: inherit; cursor: pointer; font-size: larger;" onclick="closeToaster(this.parentElement)">×</button>
        </div>
    @endif

    @if (Session::has('warning'))
        <div class="toaster" style="background-color: #fff3cd; color: #856404; padding: 10px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); opacity: 0; transition: opacity 0.5s ease-in-out, margin 0.5s ease-in-out; margin-bottom: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>{{ Session::get('warning') }}</span>
                <button style="background: none; border: none; color: inherit; cursor: pointer; font-size: larger;" onclick="closeToaster(this.parentElement)">×</button>
            </div>
        </div>
    @endif
</div>

<script>
    function showToast() {
        let toasters = document.querySelectorAll('.toaster');

        toasters.forEach(function(toaster, index) {
            setTimeout(function() {
                toaster.style.opacity = '1';

                setTimeout(function() {
                    closeToaster(toaster, index);
                }, 7000);
            }, index * 100);
        });
    }

    function closeToaster(toaster) {
        let closedToaster = toaster.parentElement;
        let nextToaster = closedToaster.nextElementSibling;

        closedToaster.style.opacity = '0';

        setTimeout(function() {
            closedToaster.remove();

            if (nextToaster) {
                nextToaster.style.marginTop = '0';
            }
        }, 500);
    }

    showToast();
</script>