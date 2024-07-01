<li class="noMobile"
    x-data="{
        search: '',

        items: @entangle('recherches'),

        get filteredItems() {
            return this.items.filter(
                i => i.toLowerCase().includes(this.search.toLowerCase())
            )
        }
    }" wire:ignore>
    <input role="combobox" x-model="search" placeholder="Club, compétition,..." class="" style="border: none;background-color:rgba(128, 128, 128, 0.095)" > 
    <ul x-show="search.length > 2" @click.outside="search = ''">
        <template x-for="item in filteredItems" >
            <li x-text="item" :key='item' @click="$wire.redirectRecherche(item)"></li>
        </template>
    </ul>

  </li>