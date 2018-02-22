<template>
  <div class="app-container">
<el-tree
  :data="categories"
  :props="defaultProps"
  node-key="id"
  default-expand-all
  :expand-on-click-node="true"
  :render-content="renderContent">
</el-tree>
    <el-dialog title="Please wait. Updating categories." :visible.sync="dataLoading">
    </el-dialog>
 </div>
</template>

<script>
/* eslint-disable */
import { getAll, deleteItem, createItem } from "@/units/category/service";
import { Message, MessageBox } from "element-ui";

export default {
  data() {
    return {
      categories: [],
      dataLoading: true,
      defaultProps: {
        children: "children",
        label: "name"
      }
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.dataLoading = true;
      getAll().then(response => {
        this.categories = response;
        this.dataLoading = false;
      });
    },
    handleEdit(data) {
      this.$router.push(`/categories/edit/${data.id}`);
    },
    append(data) {
      this.$prompt("Please input category name", "Name", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        inputPattern: /^[A-Za-z ]+$/,
        inputErrorMessage: "Only alphabetic characters"
      })
        .then(value => {
          const newChild = { id: data.id, name: value.value };
          createItem(newChild).then(response => {
            this.fetchData();
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Input canceled"
          });
        });
    },
    remove(node, data) {
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
          deleteItem(data.id).then(response => {
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
    },
    renderContent(h, { node, data, store }) {
      return (
        <span style="flex: 1; display: flex; align-items: center; justify-content: space-between; font-size: 14px; padding-right: 8px;">
          <span>
            <span>{node.label}</span>
          </span>
          <span>
            <el-button
              size="mini"
              type="gray"
              on-click={() => this.append(data)}
            >
              Append
            </el-button>
            <el-button
              size="mini"
              type="gray"
              on-click={() => this.handleEdit(data)}
            >
              Edit
            </el-button>
            <el-button
              size="mini"
              type="gray"
              on-click={() => this.remove(node, data)}
            >
              Delete
            </el-button>
          </span>
        </span>
      );
    }
  }
};
</script>

