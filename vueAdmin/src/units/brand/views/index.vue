<template>
  <div class="app-container">
    
    <div class="filter-container">
      <el-input @keyup.enter.native="handleSearch" style="width: 200px;" class="filter-item"
       :placeholder="'name'" v-model="tableDataQuery.search">
      </el-input>
      <el-button class="filter-item" type="primary" icon="el-icon-search" 
      @click="handleSearch" :disabled="!tableDataQuery.search">Search</el-button>
      <el-button class="filter-item" style="margin-left: 10px;" @click="handleCreate" type="primary"
       icon="el-icon-edit">Creat New</el-button>
    </div>

    <el-table :data="tableData" v-loading.body="tableDataLoading" element-loading-text="Loading"
     border fit highlight-current-row style="width: 100%" @sort-change="onSortChange">
     <el-table-column type="expand">
      <template slot-scope="scope">
        <p>Description:</p>
        <div>{{scope.row.description}}</div>
      </template>
    </el-table-column>
      <el-table-column align="center" label="ID" prop="real_id" sortable="custom" width="80">
      </el-table-column>
      <el-table-column label="Name" prop="name" align="center" width="">
      </el-table-column>
      <el-table-column label="Created" align="center" width="">
        <template slot-scope="scope">
          <i class="el-icon-time"></i>
          <span>{{scope.row.readable_created_at}}</span>
        </template>
      </el-table-column>
      <el-table-column align="center" label="Updated" width="">
        <template slot-scope="scope">
          <i class="el-icon-time"></i>
          <span>{{scope.row.readable_updated_at}}</span>
        </template>
      </el-table-column>
      <el-table-column label="Actions" width="">
      <template slot-scope="scope">
        <el-button
          size="mini"
          type="gray"
          @click="handleEdit(scope.row.real_id)">Edit</el-button>
        <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.row.id)">Delete</el-button>
      </template>
    </el-table-column>
    </el-table>

    <div class="pagination-container">
      <el-pagination background @size-change="handlePagerSizeChange" @current-change="handleCurrentPageChange"
       :current-page.sync="tableDataQuery.page" :page-sizes="[10,20,30, 50]" :page-size="tableDataQuery.limit"
      layout="total, sizes, prev, pager, next" :total="tableDataTotal">
      </el-pagination>
    </div>

    <pre></pre>
  </div>
</template>

<script>
/* eslint-disable */
import { getAll, deleteItem } from "@/units/brand/service";
import { Message, MessageBox } from "element-ui";

export default {
  data() {
    return {
      tableData: null,
      tableDataLoading: true,
      tableDataTotal: null,
      tableDataQuery: {
        page: 1,
        limit: 10,
        sortedBy: "desc",
        orderBy: "updated_at",
        search: null
      }
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.tableDataLoading = true;
      getAll(this.tableDataQuery).then(response => {
        this.tableData = response.data;
        this.tableDataTotal = response.meta.pagination.total;
        this.tableDataLoading = false;
      });
    },
    handlePagerSizeChange(val) {
      this.tableDataQuery.limit = val;
      this.fetchData();
    },
    handleCurrentPageChange(val) {
      this.tableDataQuery.page = val;
      this.fetchData();
    },
    handleSearch(val) {
      if (!this.tableDataQuery.search) {
        return;
      }
      this.tableDataQuery.page = 1;
      this.fetchData();
    },
    handleCreate() {
      this.$router.push('/brands/create');
    },
    handleEdit(id) {
      this.$router.push(`/brands/edit/${id}`);
    },
    onSortChange(val) {
      if (!val.prop) {
        return;
      }
      const sortedBy = val.order === "ascending" ? "asc" : "desc";
      this.tableDataQuery.orderBy = this.columnNameFilter(val.prop);
      this.tableDataQuery.sortedBy = sortedBy;
      this.fetchData();
    },
    columnNameFilter(column) {
      const columnMap = {
        real_id: "id",
        readable_created_at: "created_at",
        readable_updated_at: "updated_at",
        name: "name"
      };
      return columnMap[column];
    },
    handleDelete(id) {
      MessageBox.confirm(
        "This will permanently delete this item. Continue?",
        "Warning",
        {
          confirmButtonText: "Ok",
          cancelButtonText: "Cancel",
          type: "warning"
        }
      )
        .then(() => {
          deleteItem(id).then(response => {
            Message({
              message: "Item deleted",
              type: "success",
              duration: 2 * 1000
            });
            this.fetchData();
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Delete canceled"
          });
        });
    }
  }
};
</script>
