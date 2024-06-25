<div class="pagination" id="pagination"  x-cloak data-type="dataTable5" x-show="getRowData.length > 0">
    <small  x-show="getRowData.length > 0" x-text="'顯示第'+((Number(dataTable5.currentpage)-1)*Number(dataTable5.limit)+1)+' 至 '+((((Number(dataTable5.currentpage)-1)*Number(dataTable5.limit) +Number(dataTable5.limit))< dataTable5.dataLangth) ? ((Number(dataTable5.currentpage)-1)*Number(dataTable5.limit) +Number(dataTable5.limit)) : dataTable5.dataLangth )+' 項結果，共 '+dataTable5.dataLangth+' 項'"></small>
    <div class="links">
        <template x-if="dataTable5.currentpage>1">
            <a href="###" class="btn" @click="switchPage(Number(dataTable5.currentpage)-1)">&laquo;</a>
        </template>
        <template x-if="dataTable5.pageNumber <= 10">
            <template x-for="page in dataTable5.pageNumber">
                <a href="javascript:;" class="btn" @click="switchPage(Number(page))" :class="[(page == dataTable5.currentpage) ? 'active' : '']" x-text="page"></a>
            </template>
        </template>
        <select x-show="dataTable5.pageNumber > 10" style="width:66px;padding:8px 2px" x-model="dataTable5.currentpage">
            <template x-for="page in dataTable5.pageNumber">
                <option :value="page" x-text="page"></option>
            </template>
        </select>
        <template x-if="dataTable5.currentpage<dataTable5.pageNumber">
            <a href="###" class="btn" @click="switchPage(Number(dataTable5.currentpage)+1)">&raquo;</a>
        </template>
    </div>
</div>