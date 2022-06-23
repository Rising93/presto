<footer class="fixed-bottom my-0 bgColorFooter">
    
    <div class="container my-auto">
        <div class="d-flex flex-row justify-content-start">
            <div class="d-flex flex-row col-6 col-md-3">
                <a href="">
                    <x-_locale lang='it' nation='it'/>
                </a>
                <a href="">
                    <x-_locale lang='en' nation='gb'/>
                </a>
                <a href="">
                    <x-_locale lang='fr' nation='fr'/>
                </a>
            </div>
           
            <div class="copyright text-center my-auto col-6 col-md-6">
                <a href="{{route('lavoraconnoi')}}" class="text-center underlineHover fw-bold">{{__('ui.lavoraConNoiFooter')}}</a>
            </div>
        </div>
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Presto.it 2022</span>
        </div> 
    </div>
        
</footer>