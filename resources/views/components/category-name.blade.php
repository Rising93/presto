<span>
    @switch($name)
        @case($name=='Motori')
            {{__('ui.motoriCategoria')}}
            @break
        @case($name=='Informatica')
            {{__('ui.informaticaCategoria')}}
        @break
        @case($name=='Elettrodomestici')
            {{__('ui.elettrodomesticiCategoria')}}
        @break
        @case($name=='Libri')
            {{__('ui.libriCategoria')}}
        @break
        @case($name=='Giochi')
            {{__('ui.giochiCategoria')}}
        @break
        @case($name=='Sport')
            {{__('ui.sportCategoria')}}
        @break
        @case($name=='Immobili')
            {{__('ui.immobiliCategoria')}}
        @break
        @case($name=='Telefoni')
            {{__('ui.telefoniCategoria')}}
        @break
        @case($name=='Arredamento')
            {{__('ui.arredamentoCategoria')}}
        @break
        @case($name=='Moda')
            {{__('ui.modaCategoria')}}
        @break
        @case($name=='Salute')
            {{__('ui.saluteCategoria')}}
        @break
        @case($name=='Musica')
            {{__('ui.musicaCategoria')}}
        @break
        @default
        
        @break
    @endswitch
</span>