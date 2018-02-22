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
        <el-button type="primary" @click="onSubmit('form')" :loading="dataLoading">Create</el-button>
        <el-button @click="onCancel">Go to list</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
/* eslint-disable */
import { createItem } from "@/units/brand/service";
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
  methods: {
    saveData() {
      this.dataLoading = true;
      createItem(this.formData)
        .then(response => {
          this.formData = response.data;
          this.dataLoading = false;
          this.$message({
            type: "success",
            message: "Created"
          });
        })
        .catch(() => {
          
          this.$message({
            type: "info",
            message: "Not saved"
          });
        });
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

