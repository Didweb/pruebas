#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Pull'
  // -------------------------------
  stage ('Pull'){
    echo 'Machen PULL'
    sh 'rm -rf *'
    checkout scm
  }

  // -------------------------------
  // ----- STAGE: 'Test'
  // -------------------------------
  stage ('Test'){
    echo "Test"
  }


  // -------------------------------
  // ----- STAGE: 'Merge to Test'
  // -------------------------------
  stage ('Merge_To_Test'){
      echo "Merge To Test"
  }


}
