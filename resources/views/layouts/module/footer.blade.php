
            @php
                $profile = \App\Profile::find(1);
            @endphp
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{$profile->title}} {{ now()->year }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->