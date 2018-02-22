<template>
  <div class="app-container">
    <el-form ref="form" :model="formData" :rules="rules" label-width="120px">
      <el-form-item label="Name" prop="name">
        <el-input v-model="formData.name"></el-input>
      </el-form-item>

  <div>
      <el-form-item label="Attributes"></el-form-item>
      <el-form-item v-for="(attribute, index) in formData.attr" :key="index">
    <el-col :span="10">
      <el-input placeholder="Name" v-model="attribute.name"></el-input>
    </el-col>
    <el-col class="line" :span="2">-</el-col>
    <el-col :span="10">
      <el-input placeholder="Suffix" v-model="attribute.suffix"></el-input>
    </el-col>
    <el-col class="line" :span="2">
      <a @click="onRemoveAttribute(index)"><i class="el-icon-close"></i></a>
    </el-col>
  </el-form-item>
  <el-form-item style="float:right">
    <el-button :disabled="lastAttrEmpty" @click="onAddAttribute()" type="primary">Add attribute</el-button>
  </el-form-item>
  <div class="clearfix"></div>
  </div>
      <el-form-item>
        <el-button type="primary" @click="onSubmit('form')" :loading="dataLoading" :disabled="lastAttrEmpty">Update</el-button>
        <el-button @click="onCancel">Go to list</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
/* eslint-disable */
import { updateItem, getItem, rules, formData } from "@/units/category/service";
export default {
  data() {
    return {
      dataLoading: false,
      formData: formData,
      rules: rules
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
    onRemoveAttribute(index) {
      if (index > -1) {
        this.formData.attr.splice(index, 1);
      }
    },
    onAddAttribute() {
      this.formData.attr.push({ name: "", suffix: "" });
    },
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
      this.$router.push("/categories/index");
    }
  },
  computed: {
    lastAttrEmpty: function() {
      if (!this.formData.attr.length) {
        return false;
      }
      let lastAttribute = this.formData.attr[this.formData.attr.length - 1];
      return !lastAttribute.name || !lastAttribute.suffix;
    }
  }
};
</script>

<style scoped>
.line {
  text-align: center;
}
</style>

