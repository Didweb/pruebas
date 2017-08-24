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
      sh('git status')
      sh('git checkout  test')
      sh('git merge  test')
  }

  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "Merge To Test"
      sshagent(['git-credentials-id']) {
              sh "git push origin test"
            }

 }

}
