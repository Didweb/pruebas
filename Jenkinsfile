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
    sh('git branch -av')

  }


  // -------------------------------
  // ----- STAGE: 'Merge to Test'
  // -------------------------------
  stage ('Merge_To_Test'){
      echo "Merge To Test"
      sh('git status')
      sh('git branch -av')
      echo " Estas en --->> ${BRANCH_NAME}"
      sh('git merge  test')
  }

  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "Merge To Test"
      sh('git branch -av')
      if (BRANCH_NAME == "master") {
                  echo " rama = ${BRANCH_NAME} "
               }
               else {
                  echo "Not in 'master' branch. Don't attempt publishing. Estas en --->> ${BRANCH_NAME}"
               }

 }

}
