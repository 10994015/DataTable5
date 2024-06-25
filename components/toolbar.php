<div class="toolbar">
    <div class="limit">
        <select class="form-control" x-model="dataTable5.limit">
            <option value="99999999">顯示全部</option>
            <template x-for="limit in dataTable5.limitData" :key="limit">
                <option :value="limit" x-text="limit" :selected="dataTable5.limit == limit"></option>
            </template>
        </select>
    </div>
    <div class="categories" x-show="dataTable5.categoryShow">
        <button x-cloak data-type="category-btn" :class="['btn', (dataTable5.category == '') ? 'btn-warning' : 'non-select']" @click="dataTable5.category = ''">ALL</button>
        <template x-for="categories in dataTable5.categoriesColumns">
            <template x-for="category in categories.categories">
                <button x-cloak data-type="category-btn" :class="['btn', (dataTable5.category == category.value) ? 'btn-warning' : 'non-select']"  @click="changeCategory(category.value, categories.column)"><span x-text="category.name"></span></button>
            </template>
        </template>
        
    </div>
    <div class="search">
        <input type="text" x-model="dataTable5.search" class="form-control" placeholder="搜尋...">
    </div>
</div>

<div class="loading" x-show="isloading">
    <div class="loader"></div>
</div>