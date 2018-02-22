<template>
  <div class="app-container">
    <el-form ref="form" :model="formData" :rules="rules" label-width="120px">
      <el-form-item label="Name" prop="name">
        <el-input v-model="formData.name"></el-input>
      </el-form-item>
      
      <el-form-item label="Description">
        <el-input type="textarea" v-model="formData.description"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit('form')" :loading="dataLoading">Update</el-button>
        <el-button @click="onCancel">Go to list</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
/* eslint-disable */
import { updateItem, getItem } from "@/units/brand/service";
export default {
  data() {
    return {
      dataLoading: false,
      formData: {
        name: "",
        description: ""
      },
      rules: {
        name: [
          {
            required: true,
            message: "Please input brand name",
            trigger: "blur"
          },
          {
            min: 3,
            max: 255,
            message: "Length should be 3 to 255 characters",
            trigger: "blur"
          }
        ]
      }
    };
  },
  created() {
    this.dataLoading = true;
    getItem(parseInt(this.$route.params.id)).then(response => {
      this.formData = response.data;
      this.dataLoading = false;
    });
  },
  methods: {
    saveData() {
      this.dataLoading = true;
      updateItem(this.formData.id, this.formData)
        .then(response => {
          this.formData = response.data;
          this.$message({
            type: "success",
            message: "Updated"
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Not updated"
          });
        });
        this.dataLoading = false;
    },
    onSubmit(formName) {
      this.$refs[formName].validate(valid => {
        if (valid) {
          this.saveData();
        } else {
          return false;
        }
      });
    },
    onCancel() {
      this.$router.push("/brands/index");
    }
  }
};
</script>

<style scoped>
.line {
  text-align: center;
}
</style>

