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


  }

  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "Merge To Test"
      sh('git branch -av')
      sh('git checkout -b fantasma')
      sh('git remote -v')
      sh('git push origin fantasma')
      if (BRANCH_NAME == "master") {
                  echo " rama = ${BRANCH_NAME} "
               }
               else {
                  echo "Estas en --->> ${BRANCH_NAME}"
               }

 }

}
