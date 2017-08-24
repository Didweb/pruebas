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
    GIT_BRANCH = sh(returnStdout: true, script: 'git checkout origin/test').trim()
    echo "Das Branch ist = ${GIT_BRANCH}"
  }


  // -------------------------------
  // ----- STAGE: 'Merge to Test'
  // -------------------------------
  stage ('Merge_To_Test'){
      echo "Merge To Test"
  }


}
