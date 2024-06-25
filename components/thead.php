<thead>
    <tr>
        <template x-for="header in dataTable5.tableHeader" :key="header.name">
            <th :class="[dataTable5.sort===header.value ? 'sort' : '']" @click="header.value ? selectSort(header.value) : ''"><span x-text="header.name"></span><i  x-show="dataTable5.sort===header.value" :class="['fa-solid', 'fa-chevron-down', dataTable5.sortDirection==='asc' ? 'sort' : '']"></i></th>
        </template>
    </tr>
</thead>
<tbody x-show="getRowData.length===0" x-cloak data-type="dataTable5">
    <tr>
        <td :colspan="dataTable5.tableHeader.length" class="text-center non-data">
            <span>查無資料。</span>
        </td>
    </tr>
</tbody>